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

class SalesQuotationController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('sales_quotation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesQuotations = SalesQuotation::with(['kode_inquiry'])->get();

        return view('admin.salesQuotations.index', compact('salesQuotations'));
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
