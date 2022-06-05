<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySalesQuotationRequest;
use App\Http\Requests\StoreSalesQuotationRequest;
use App\Http\Requests\UpdateSalesQuotationRequest;
use App\Models\CrmCustomer;
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

        $salesQuotations = SalesQuotation::with(['id_sales_inquiry', 'id_customer'])->get();

        return view('frontend.salesQuotations.index', compact('salesQuotations'));
    }

    public function create()
    {
        abort_if(Gate::denies('sales_quotation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_sales_inquiries = SalesInquiry::pluck('inquiry', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.salesQuotations.create', compact('id_customers', 'id_sales_inquiries'));
    }

    public function store(StoreSalesQuotationRequest $request)
    {
        $salesQuotation = SalesQuotation::create($request->all());

        return redirect()->route('frontend.sales-quotations.index');
    }

    public function edit(SalesQuotation $salesQuotation)
    {
        abort_if(Gate::denies('sales_quotation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_sales_inquiries = SalesInquiry::pluck('inquiry', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salesQuotation->load('id_sales_inquiry', 'id_customer');

        return view('frontend.salesQuotations.edit', compact('id_customers', 'id_sales_inquiries', 'salesQuotation'));
    }

    public function update(UpdateSalesQuotationRequest $request, SalesQuotation $salesQuotation)
    {
        $salesQuotation->update($request->all());

        return redirect()->route('frontend.sales-quotations.index');
    }

    public function show(SalesQuotation $salesQuotation)
    {
        abort_if(Gate::denies('sales_quotation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesQuotation->load('id_sales_inquiry', 'id_customer');

        return view('frontend.salesQuotations.show', compact('salesQuotation'));
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
