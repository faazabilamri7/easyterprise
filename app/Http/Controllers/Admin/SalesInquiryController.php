<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function index()
    {
        abort_if(Gate::denies('sales_inquiry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesInquiries = SalesInquiry::with(['id_customer', 'id_product'])->get();

        return view('admin.salesInquiries.index', compact('salesInquiries'));
    }

    public function create()
    {
        abort_if(Gate::denies('sales_inquiry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.salesInquiries.create', compact('id_customers', 'id_products'));
    }

    public function store(StoreSalesInquiryRequest $request)
    {
        $salesInquiry = SalesInquiry::create($request->all());

        return redirect()->route('admin.sales-inquiries.index');
    }

    public function edit(SalesInquiry $salesInquiry)
    {
        abort_if(Gate::denies('sales_inquiry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salesInquiry->load('id_customer', 'id_product');

        return view('admin.salesInquiries.edit', compact('id_customers', 'id_products', 'salesInquiry'));
    }

    public function update(UpdateSalesInquiryRequest $request, SalesInquiry $salesInquiry)
    {
        $salesInquiry->update($request->all());

        return redirect()->route('admin.sales-inquiries.index');
    }

    public function show(SalesInquiry $salesInquiry)
    {
        abort_if(Gate::denies('sales_inquiry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesInquiry->load('id_customer', 'id_product', 'inquiryRequestStockProducts');

        return view('admin.salesInquiries.show', compact('salesInquiry'));
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
