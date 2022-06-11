<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySalesQuotationRequest;
use App\Http\Requests\StoreSalesQuotationRequest;
use App\Http\Requests\UpdateSalesQuotationRequest;
use App\Models\SalesInquiry;
use App\Models\SalesQuotation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SalesQuotationController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('sales_quotation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SalesQuotation::with(['kode_inquiry'])->select(sprintf('%s.*', (new SalesQuotation())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'sales_quotation_show';
                $editGate = 'sales_quotation_edit';
                $deleteGate = 'sales_quotation_delete';
                $crudRoutePart = 'sales-quotations';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id_sales_quotation', function ($row) {
                return $row->id_sales_quotation ? $row->id_sales_quotation : '';
            });
            $table->addColumn('kode_inquiry_inquiry_kode', function ($row) {
                return $row->kode_inquiry ? $row->kode_inquiry->inquiry_kode : '';
            });

            $table->editColumn('harga', function ($row) {
                return $row->harga ? $row->harga : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? SalesQuotation::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'kode_inquiry']);

            return $table->make(true);
        }

        return view('admin.salesQuotations.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sales_quotation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kode_inquiries = SalesInquiry::pluck('inquiry_kode', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.salesQuotations.create', compact('kode_inquiries'));
    }

    public function store(StoreSalesQuotationRequest $request)
    {
        $salesQuotation = SalesQuotation::create($request->all());

        return redirect()->route('admin.sales-quotations.index');
    }

    public function edit(SalesQuotation $salesQuotation)
    {
        abort_if(Gate::denies('sales_quotation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kode_inquiries = SalesInquiry::pluck('inquiry_kode', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salesQuotation->load('kode_inquiry');

        return view('admin.salesQuotations.edit', compact('kode_inquiries', 'salesQuotation'));
    }

    public function update(UpdateSalesQuotationRequest $request, SalesQuotation $salesQuotation)
    {
        $salesQuotation->update($request->all());

        return redirect()->route('admin.sales-quotations.index');
    }

    public function show(SalesQuotation $salesQuotation)
    {
        abort_if(Gate::denies('sales_quotation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesQuotation->load('kode_inquiry', 'idSalesQuotationSalesOrders');

        return view('admin.salesQuotations.show', compact('salesQuotation'));
    }

    public function destroy(SalesQuotation $salesQuotation)
    {
        abort_if(Gate::denies('sales_quotation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesQuotation->delete();

        return back();
    }

    public function massDestroy(MassDestroySalesQuotationRequest $request)
    {
        SalesQuotation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
