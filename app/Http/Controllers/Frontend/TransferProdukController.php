<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTransferProdukRequest;
use App\Http\Requests\StoreTransferProdukRequest;
use App\Http\Requests\UpdateTransferProdukRequest;
use App\Models\TransferProduk;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransferProdukController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('transfer_produk_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transferProduks = TransferProduk::all();

        return view('frontend.transferProduks.index', compact('transferProduks'));
    }

    public function create()
    {
        abort_if(Gate::denies('transfer_produk_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.transferProduks.create');
    }

    public function store(StoreTransferProdukRequest $request)
    {
        $transferProduk = TransferProduk::create($request->all());

        return redirect()->route('frontend.transfer-produks.index');
    }

    public function edit(TransferProduk $transferProduk)
    {
        abort_if(Gate::denies('transfer_produk_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.transferProduks.edit', compact('transferProduk'));
    }

    public function update(UpdateTransferProdukRequest $request, TransferProduk $transferProduk)
    {
        $transferProduk->update($request->all());

        return redirect()->route('frontend.transfer-produks.index');
    }

    public function show(TransferProduk $transferProduk)
    {
        abort_if(Gate::denies('transfer_produk_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.transferProduks.show', compact('transferProduk'));
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
