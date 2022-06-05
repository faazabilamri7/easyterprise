<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPengirimanRequest;
use App\Http\Requests\StorePengirimanRequest;
use App\Http\Requests\UpdatePengirimanRequest;
use App\Models\Pengiriman;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PengirimanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pengiriman_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengirimen = Pengiriman::all();

        return view('admin.pengirimen.index', compact('pengirimen'));
    }

    public function create()
    {
        abort_if(Gate::denies('pengiriman_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pengirimen.create');
    }

    public function store(StorePengirimanRequest $request)
    {
        $pengiriman = Pengiriman::create($request->all());

        return redirect()->route('admin.pengirimen.index');
    }

    public function edit(Pengiriman $pengiriman)
    {
        abort_if(Gate::denies('pengiriman_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pengirimen.edit', compact('pengiriman'));
    }

    public function update(UpdatePengirimanRequest $request, Pengiriman $pengiriman)
    {
        $pengiriman->update($request->all());

        return redirect()->route('admin.pengirimen.index');
    }

    public function show(Pengiriman $pengiriman)
    {
        abort_if(Gate::denies('pengiriman_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pengirimen.show', compact('pengiriman'));
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
