<?php

namespace App\Http\Controllers\Admin;

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
use Yajra\DataTables\Facades\DataTables;

class RequestStockProductController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('request_stock_product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = RequestStockProduct::with(['inquiry', 'request_product'])->select(sprintf('%s.*', (new RequestStockProduct())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'request_stock_product_show';
                $editGate = 'request_stock_product_edit';
                $deleteGate = 'request_stock_product_delete';
                $crudRoutePart = 'request-stock-products';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id_request_product', function ($row) {
                return $row->id_request_product ? $row->id_request_product : '';
            });
            $table->addColumn('inquiry_inquiry_kode', function ($row) {
                return $row->inquiry ? $row->inquiry->inquiry_kode : '';
            });

            $table->addColumn('request_product_name', function ($row) {
                return $row->request_product ? $row->request_product->name : '';
            });

            $table->editColumn('qty', function ($row) {
                return $row->qty ? $row->qty : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? RequestStockProduct::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'inquiry', 'request_product']);

            return $table->make(true);
        }

        return view('admin.requestStockProducts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('request_stock_product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inquiries = SalesInquiry::pluck('inquiry_kode', 'id')->prepend(trans('global.pleaseSelect'), '');

        $request_products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.requestStockProducts.create', compact('inquiries', 'request_products'));
    }

    public function store(StoreRequestStockProductRequest $request)
    {
        $requestStockProduct = RequestStockProduct::create($request->all());

        return redirect()->route('admin.request-stock-products.index');
    }

    public function edit(RequestStockProduct $requestStockProduct)
    {
        abort_if(Gate::denies('request_stock_product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inquiries = SalesInquiry::pluck('inquiry_kode', 'id')->prepend(trans('global.pleaseSelect'), '');

        $request_products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $requestStockProduct->load('inquiry', 'request_product');

        return view('admin.requestStockProducts.edit', compact('inquiries', 'requestStockProduct', 'request_products'));
    }

    public function update(UpdateRequestStockProductRequest $request, RequestStockProduct $requestStockProduct)
    {
        $requestStockProduct->update($request->all());

        return redirect()->route('admin.request-stock-products.index');
    }

    public function show(RequestStockProduct $requestStockProduct)
    {
        abort_if(Gate::denies('request_stock_product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestStockProduct->load('inquiry', 'request_product', 'idRequestProductTasks');

        return view('admin.requestStockProducts.show', compact('requestStockProduct'));
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
