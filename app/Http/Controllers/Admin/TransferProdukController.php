<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTransferProdukRequest;
use App\Http\Requests\StoreTransferProdukRequest;
use App\Http\Requests\UpdateTransferProdukRequest;
use App\Models\Product;
use App\Models\QualityControl;
use App\Models\TransferProduk;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransferProdukController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('transfer_produk_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transferProduks = TransferProduk::with(['id_quality_control', 'product_name'])->get();

        return view('admin.transferProduks.index', compact('transferProduks'));
    }

    public function create()
    {
        abort_if(Gate::denies('transfer_produk_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_quality_controls = QualityControl::pluck('id_quality_control', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product_names = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.transferProduks.create', compact('id_quality_controls', 'product_names'));
    }

    public function store(StoreTransferProdukRequest $request)
    {
        $transferProduk = TransferProduk::create($request->all());

        return redirect()->route('admin.transfer-produks.index');
    }

    public function edit(TransferProduk $transferProduk)
    {
        abort_if(Gate::denies('transfer_produk_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_quality_controls = QualityControl::pluck('id_quality_control', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product_names = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transferProduk->load('id_quality_control', 'product_name');

        return view('admin.transferProduks.edit', compact('id_quality_controls', 'product_names', 'transferProduk'));
    }

    public function update(UpdateTransferProdukRequest $request, TransferProduk $transferProduk)
    {
        $transferProduk->update($request->all());

        return redirect()->route('admin.transfer-produks.index');
    }

    public function show(TransferProduk $transferProduk)
    {
        abort_if(Gate::denies('transfer_produk_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transferProduk->load('id_quality_control', 'product_name');

        return view('admin.transferProduks.show', compact('transferProduk'));
    }

    public function destroy(TransferProduk $transferProduk)
    {
        abort_if(Gate::denies('transfer_produk_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transferProduk->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransferProdukRequest $request)
    {
        TransferProduk::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
