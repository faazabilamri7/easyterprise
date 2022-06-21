<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySalesOrderRequest;
use App\Http\Requests\StoreSalesOrderRequest;
use App\Http\Requests\UpdateSalesOrderRequest;
use App\Models\SalesOrder;
use App\Models\SalesQuotation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SalesOrderController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('sales_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SalesOrder::with(['id_sales_quotation'])->select(sprintf('%s.*', (new SalesOrder())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'sales_order_show';
                $editGate = 'sales_order_edit';
                $deleteGate = 'sales_order_delete';
                $crudRoutePart = 'sales-orders';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('no_sales_order', function ($row) {
                return $row->no_sales_order ? $row->no_sales_order : '';
            });
            $table->addColumn('id_sales_quotation_id_sales_quotation', function ($row) {
                return $row->id_sales_quotation ? $row->id_sales_quotation->id_sales_quotation : '';
            });

            $table->editColumn('id_sales_quotation.id_sales_quotation', function ($row) {
                return $row->id_sales_quotation ? (is_string($row->id_sales_quotation) ? $row->id_sales_quotation : $row->id_sales_quotation->id_sales_quotation) : '';
            });

            $table->editColumn('detail_order', function ($row) {
                return $row->detail_order ? $row->detail_order : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? SalesOrder::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'id_sales_quotation']);

            return $table->make(true);
        }

        return view('admin.salesOrders.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sales_order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_sales_quotations = SalesQuotation::pluck('id_sales_quotation', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.salesOrders.create', compact('id_sales_quotations'));
    }

    public function store(StoreSalesOrderRequest $request)
    {
        $salesOrder = SalesOrder::create($request->all());

        return redirect()->route('admin.sales-orders.index');
    }

    public function edit(SalesOrder $salesOrder)
    {
        abort_if(Gate::denies('sales_order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_sales_quotations = SalesQuotation::pluck('id_sales_quotation', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salesOrder->load('id_sales_quotation');

        return view('admin.salesOrders.edit', compact('id_sales_quotations', 'salesOrder'));
    }

    public function update(UpdateSalesOrderRequest $request, SalesOrder $salesOrder)
    {
        $salesOrder->update($request->all());

        return redirect()->route('admin.sales-orders.index');
    }

    public function show(SalesOrder $salesOrder)
    {
        abort_if(Gate::denies('sales_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesOrder->load('id_sales_quotation', 'noSalesOrderPengirimen');

        return view('admin.salesOrders.show', compact('salesOrder'));
    }

    public function destroy(SalesOrder $salesOrder)
    {
        abort_if(Gate::denies('sales_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesOrder->delete();

        return back();
    }

    public function massDestroy(MassDestroySalesOrderRequest $request)
    {
        SalesOrder::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
