<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJurnalPenyelesaianRequest;
use App\Http\Requests\StoreJurnalPenyelesaianRequest;
use App\Http\Requests\UpdateJurnalPenyelesaianRequest;
use App\Models\Akun;
use App\Models\JurnalPenyelesaian;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JurnalPenyelesaianController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jurnal_penyelesaian_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jurnalPenyelesaians = JurnalPenyelesaian::with(['akun'])->get();

        return view('frontend.jurnalPenyelesaians.index', compact('jurnalPenyelesaians'));
    }

    public function create()
    {
        abort_if(Gate::denies('jurnal_penyelesaian_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akuns = Akun::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.jurnalPenyelesaians.create', compact('akuns'));
    }

    public function store(StoreJurnalPenyelesaianRequest $request)
    {
        $jurnalPenyelesaian = JurnalPenyelesaian::create($request->all());

        return redirect()->route('frontend.jurnal-penyelesaians.index');
    }

    public function edit(JurnalPenyelesaian $jurnalPenyelesaian)
    {
        abort_if(Gate::denies('jurnal_penyelesaian_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akuns = Akun::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jurnalPenyelesaian->load('akun');

        return view('frontend.jurnalPenyelesaians.edit', compact('akuns', 'jurnalPenyelesaian'));
    }

    public function update(UpdateJurnalPenyelesaianRequest $request, JurnalPenyelesaian $jurnalPenyelesaian)
    {
        $jurnalPenyelesaian->update($request->all());

        return redirect()->route('frontend.jurnal-penyelesaians.index');
    }

    public function show(JurnalPenyelesaian $jurnalPenyelesaian)
    {
        abort_if(Gate::denies('jurnal_penyelesaian_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jurnalPenyelesaian->load('akun');

        return view('frontend.jurnalPenyelesaians.show', compact('jurnalPenyelesaian'));
    }

    public function destroy(JurnalPenyelesaian $jurnalPenyelesaian)
    {
        abort_if(Gate::denies('jurnal_penyelesaian_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jurnalPenyelesaian->delete();

        return back();
    }

    public function massDestroy(MassDestroyJurnalPenyelesaianRequest $request)
    {
        JurnalPenyelesaian::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
