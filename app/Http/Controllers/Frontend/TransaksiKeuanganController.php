<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTransaksiKeuanganRequest;
use App\Http\Requests\StoreTransaksiKeuanganRequest;
use App\Http\Requests\UpdateTransaksiKeuanganRequest;
use App\Models\KasBank;
use App\Models\SalesOrder;
use App\Models\TransaksiKeuangan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransaksiKeuanganController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('transaksi_keuangan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaksiKeuangans = TransaksiKeuangan::with(['kas_bank', 'sales_product'])->get();

        return view('frontend.transaksiKeuangans.index', compact('transaksiKeuangans'));
    }

    public function create()
    {
        abort_if(Gate::denies('transaksi_keuangan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kas_banks = KasBank::pluck('jumlah', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sales_products = SalesOrder::pluck('detail_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.transaksiKeuangans.create', compact('kas_banks', 'sales_products'));
    }

    public function store(StoreTransaksiKeuanganRequest $request)
    {
        $transaksiKeuangan = TransaksiKeuangan::create($request->all());

        return redirect()->route('frontend.transaksi-keuangans.index');
    }

    public function edit(TransaksiKeuangan $transaksiKeuangan)
    {
        abort_if(Gate::denies('transaksi_keuangan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kas_banks = KasBank::pluck('jumlah', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sales_products = SalesOrder::pluck('detail_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transaksiKeuangan->load('kas_bank', 'sales_product');

        return view('frontend.transaksiKeuangans.edit', compact('kas_banks', 'sales_products', 'transaksiKeuangan'));
    }

    public function update(UpdateTransaksiKeuanganRequest $request, TransaksiKeuangan $transaksiKeuangan)
    {
        $transaksiKeuangan->update($request->all());

        return redirect()->route('frontend.transaksi-keuangans.index');
    }

    public function show(TransaksiKeuangan $transaksiKeuangan)
    {
        abort_if(Gate::denies('transaksi_keuangan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaksiKeuangan->load('kas_bank', 'sales_product');

        return view('frontend.transaksiKeuangans.show', compact('transaksiKeuangan'));
    }

    public function destroy(TransaksiKeuangan $transaksiKeuangan)
    {
        abort_if(Gate::denies('transaksi_keuangan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaksiKeuangan->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransaksiKeuanganRequest $request)
    {
        TransaksiKeuangan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
