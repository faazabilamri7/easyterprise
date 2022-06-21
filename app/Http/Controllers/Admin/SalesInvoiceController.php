<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySalesInvoiceRequest;
use App\Http\Requests\StoreSalesInvoiceRequest;
use App\Http\Requests\UpdateSalesInvoiceRequest;
use App\Models\CrmCustomer;
use App\Models\SalesInvoice;
use App\Models\SalesOrder;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SalesInvoiceController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('sales_invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SalesInvoice::with(['sales_order', 'customer'])->select(sprintf('%s.*', (new SalesInvoice())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'sales_invoice_show';
                $editGate = 'sales_invoice_edit';
                $deleteGate = 'sales_invoice_delete';
                $crudRoutePart = 'sales-invoices';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('no_sales_invoice', function ($row) {
                return $row->no_sales_invoice ? $row->no_sales_invoice : '';
            });
            $table->addColumn('sales_order_no_sales_order', function ($row) {
                return $row->sales_order ? $row->sales_order->no_sales_order : '';
            });

            $table->addColumn('customer_first_name', function ($row) {
                return $row->customer ? $row->customer->first_name : '';
            });

            $table->editColumn('total', function ($row) {
                return $row->total ? $row->total : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? SalesInvoice::STATUS_RADIO[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'sales_order', 'customer']);

            return $table->make(true);
        }

        return view('admin.salesInvoices.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sales_invoice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sales_orders = SalesOrder::pluck('no_sales_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.salesInvoices.create', compact('customers', 'sales_orders'));
    }

    public function store(StoreSalesInvoiceRequest $request)
    {
        $salesInvoice = SalesInvoice::create($request->all());

        return redirect()->route('admin.sales-invoices.index');
    }

    public function edit(SalesInvoice $salesInvoice)
    {
        abort_if(Gate::denies('sales_invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sales_orders = SalesOrder::pluck('no_sales_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salesInvoice->load('sales_order', 'customer');

        return view('admin.salesInvoices.edit', compact('customers', 'salesInvoice', 'sales_orders'));
    }

    public function update(UpdateSalesInvoiceRequest $request, SalesInvoice $salesInvoice)
    {
        $salesInvoice->update($request->all());

        return redirect()->route('admin.sales-invoices.index');
    }

    public function show(SalesInvoice $salesInvoice)
    {
        abort_if(Gate::denies('sales_invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesInvoice->load('sales_order', 'customer');

        return view('admin.salesInvoices.show', compact('salesInvoice'));
    }

    public function destroy(SalesInvoice $salesInvoice)
    {
        abort_if(Gate::denies('sales_invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesInvoice->delete();

        return back();
    }

    public function massDestroy(MassDestroySalesInvoiceRequest $request)
    {
        SalesInvoice::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
