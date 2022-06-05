<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBiayaProduksiRequest;
use App\Http\Requests\StoreBiayaProduksiRequest;
use App\Http\Requests\UpdateBiayaProduksiRequest;
use App\Models\BiayaProduksi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BiayaProduksiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('biaya_produksi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biayaProduksis = BiayaProduksi::all();

        return view('admin.biayaProduksis.index', compact('biayaProduksis'));
    }

    public function create()
    {
        abort_if(Gate::denies('biaya_produksi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.biayaProduksis.create');
    }

    public function store(StoreBiayaProduksiRequest $request)
    {
        $biayaProduksi = BiayaProduksi::create($request->all());

        return redirect()->route('admin.biaya-produksis.index');
    }

    public function edit(BiayaProduksi $biayaProduksi)
    {
        abort_if(Gate::denies('biaya_produksi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.biayaProduksis.edit', compact('biayaProduksi'));
    }

    public function update(UpdateBiayaProduksiRequest $request, BiayaProduksi $biayaProduksi)
    {
        $biayaProduksi->update($request->all());

        return redirect()->route('admin.biaya-produksis.index');
    }

    public function show(BiayaProduksi $biayaProduksi)
    {
        abort_if(Gate::denies('biaya_produksi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.biayaProduksis.show', compact('biayaProduksi'));
    }

    public function destroy(BiayaProduksi $biayaProduksi)
    {
        abort_if(Gate::denies('biaya_produksi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biayaProduksi->delete();

        return back();
    }

    public function massDestroy(MassDestroyBiayaProduksiRequest $request)
    {
        BiayaProduksi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
