<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySalesInquiryRequest;
use App\Http\Requests\StoreSalesInquiryRequest;
use App\Http\Requests\UpdateSalesInquiryRequest;
use App\Models\CrmCustomer;
use App\Models\Product;
use App\Models\SalesInquiry;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalesInquiryController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('sales_inquiry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesInquiries = SalesInquiry::with(['id_customer', 'nama_produk'])->get();

        return view('frontend.salesInquiries.index', compact('salesInquiries'));
    }

    public function create()
    {
        abort_if(Gate::denies('sales_inquiry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nama_produks = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.salesInquiries.create', compact('id_customers', 'nama_produks'));
    }

    public function store(StoreSalesInquiryRequest $request)
    {
        $salesInquiry = SalesInquiry::create($request->all());

        return redirect()->route('frontend.sales-inquiries.index');
    }

    public function edit(SalesInquiry $salesInquiry)
    {
        abort_if(Gate::denies('sales_inquiry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nama_produks = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salesInquiry->load('id_customer', 'nama_produk');

        return view('frontend.salesInquiries.edit', compact('id_customers', 'nama_produks', 'salesInquiry'));
    }

    public function update(UpdateSalesInquiryRequest $request, SalesInquiry $salesInquiry)
    {
        $salesInquiry->update($request->all());

        return redirect()->route('frontend.sales-inquiries.index');
    }

    public function show(SalesInquiry $salesInquiry)
    {
        abort_if(Gate::denies('sales_inquiry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesInquiry->load('id_customer', 'nama_produk', 'inquiryRequestStockProducts', 'kodeInquirySalesQuotations');

        return view('frontend.salesInquiries.show', compact('salesInquiry'));
    }

    public function destroy(SalesInquiry $salesInquiry)
    {
        abort_if(Gate::denies('sales_inquiry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesInquiry->delete();

        return back();
    }

    public function massDestroy(MassDestroySalesInquiryRequest $request)
    {
        SalesInquiry::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
