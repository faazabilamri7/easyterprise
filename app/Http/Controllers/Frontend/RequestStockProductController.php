<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyRequestStockProductRequest;
use App\Http\Requests\StoreRequestStockProductRequest;
use App\Http\Requests\UpdateRequestStockProductRequest;
use App\Models\Product;
use App\Models\RequestStockProduct;
use App\Models\SalesInquiry;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequestStockProductController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('request_stock_product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestStockProducts = RequestStockProduct::with(['inquiry', 'request_product'])->get();

        return view('frontend.requestStockProducts.index', compact('requestStockProducts'));
    }

    public function create()
    {
        abort_if(Gate::denies('request_stock_product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inquiries = SalesInquiry::pluck('inquiry_kode', 'id')->prepend(trans('global.pleaseSelect'), '');

        $request_products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.requestStockProducts.create', compact('inquiries', 'request_products'));
    }

    public function store(StoreRequestStockProductRequest $request)
    {
        $requestStockProduct = RequestStockProduct::create($request->all());

        return redirect()->route('frontend.request-stock-products.index');
    }

    public function edit(RequestStockProduct $requestStockProduct)
    {
        abort_if(Gate::denies('request_stock_product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inquiries = SalesInquiry::pluck('inquiry_kode', 'id')->prepend(trans('global.pleaseSelect'), '');

        $request_products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $requestStockProduct->load('inquiry', 'request_product');

        return view('frontend.requestStockProducts.edit', compact('inquiries', 'requestStockProduct', 'request_products'));
    }

    public function update(UpdateRequestStockProductRequest $request, RequestStockProduct $requestStockProduct)
    {
        $requestStockProduct->update($request->all());

        return redirect()->route('frontend.request-stock-products.index');
    }

    public function show(RequestStockProduct $requestStockProduct)
    {
        abort_if(Gate::denies('request_stock_product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestStockProduct->load('inquiry', 'request_product', 'idRequestProductTasks');

        return view('frontend.requestStockProducts.show', compact('requestStockProduct'));
    }

    public function destroy(RequestStockProduct $requestStockProduct)
    {
        abort_if(Gate::denies('request_stock_product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestStockProduct->delete();

        return back();
    }

    public function massDestroy(MassDestroyRequestStockProductRequest $request)
    {
        RequestStockProduct::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
