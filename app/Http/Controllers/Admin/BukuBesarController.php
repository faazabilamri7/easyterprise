<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBukuBesarRequest;
use App\Http\Requests\StoreBukuBesarRequest;
use App\Http\Requests\UpdateBukuBesarRequest;
use App\Models\Akun;
use App\Models\BukuBesar;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BukuBesarController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('buku_besar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bukuBesars = BukuBesar::with(['akun'])->get();

        return view('admin.bukuBesars.index', compact('bukuBesars'));
    }

    public function create()
    {
        abort_if(Gate::denies('buku_besar_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akuns = Akun::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.bukuBesars.create', compact('akuns'));
    }

    public function store(StoreBukuBesarRequest $request)
    {
        $bukuBesar = BukuBesar::create($request->all());

        return redirect()->route('admin.buku-besars.index');
    }

    public function edit(BukuBesar $bukuBesar)
    {
        abort_if(Gate::denies('buku_besar_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akuns = Akun::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bukuBesar->load('akun');

        return view('admin.bukuBesars.edit', compact('akuns', 'bukuBesar'));
    }

    public function update(UpdateBukuBesarRequest $request, BukuBesar $bukuBesar)
    {
        $bukuBesar->update($request->all());

        return redirect()->route('admin.buku-besars.index');
    }

    public function show(BukuBesar $bukuBesar)
    {
        abort_if(Gate::denies('buku_besar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bukuBesar->load('akun');

        return view('admin.bukuBesars.show', compact('bukuBesar'));
    }

    public function destroy(BukuBesar $bukuBesar)
    {
        abort_if(Gate::denies('buku_besar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bukuBesar->delete();

        return back();
    }

    public function massDestroy(MassDestroyBukuBesarRequest $request)
    {
        BukuBesar::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
