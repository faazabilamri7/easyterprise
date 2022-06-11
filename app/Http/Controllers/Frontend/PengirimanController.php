<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPengirimanRequest;
use App\Http\Requests\StorePengirimanRequest;
use App\Http\Requests\UpdatePengirimanRequest;
use App\Models\Pengiriman;
use App\Models\SalesOrder;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PengirimanController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('pengiriman_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengirimen = Pengiriman::with(['no_sales_order'])->get();

        return view('frontend.pengirimen.index', compact('pengirimen'));
    }

    public function create()
    {
        abort_if(Gate::denies('pengiriman_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $no_sales_orders = SalesOrder::pluck('no_sales_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.pengirimen.create', compact('no_sales_orders'));
    }

    public function store(StorePengirimanRequest $request)
    {
        $pengiriman = Pengiriman::create($request->all());

        return redirect()->route('frontend.pengirimen.index');
    }

    public function edit(Pengiriman $pengiriman)
    {
        abort_if(Gate::denies('pengiriman_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $no_sales_orders = SalesOrder::pluck('no_sales_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pengiriman->load('no_sales_order');

        return view('frontend.pengirimen.edit', compact('no_sales_orders', 'pengiriman'));
    }

    public function update(UpdatePengirimanRequest $request, Pengiriman $pengiriman)
    {
        $pengiriman->update($request->all());

        return redirect()->route('frontend.pengirimen.index');
    }

    public function show(Pengiriman $pengiriman)
    {
        abort_if(Gate::denies('pengiriman_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengiriman->load('no_sales_order');

        return view('frontend.pengirimen.show', compact('pengiriman'));
    }

    public function destroy(Pengiriman $pengiriman)
    {
        abort_if(Gate::denies('pengiriman_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengiriman->delete();

        return back();
    }

    public function massDestroy(MassDestroyPengirimanRequest $request)
    {
        Pengiriman::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
