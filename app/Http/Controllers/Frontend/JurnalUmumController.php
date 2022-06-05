<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJurnalUmumRequest;
use App\Http\Requests\StoreJurnalUmumRequest;
use App\Http\Requests\UpdateJurnalUmumRequest;
use App\Models\Akun;
use App\Models\JurnalUmum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JurnalUmumController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jurnal_umum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jurnalUmums = JurnalUmum::with(['akun'])->get();

        return view('frontend.jurnalUmums.index', compact('jurnalUmums'));
    }

    public function create()
    {
        abort_if(Gate::denies('jurnal_umum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akuns = Akun::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.jurnalUmums.create', compact('akuns'));
    }

    public function store(StoreJurnalUmumRequest $request)
    {
        $jurnalUmum = JurnalUmum::create($request->all());

        return redirect()->route('frontend.jurnal-umums.index');
    }

    public function edit(JurnalUmum $jurnalUmum)
    {
        abort_if(Gate::denies('jurnal_umum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akuns = Akun::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jurnalUmum->load('akun');

        return view('frontend.jurnalUmums.edit', compact('akuns', 'jurnalUmum'));
    }

    public function update(UpdateJurnalUmumRequest $request, JurnalUmum $jurnalUmum)
    {
        $jurnalUmum->update($request->all());

        return redirect()->route('frontend.jurnal-umums.index');
    }

    public function show(JurnalUmum $jurnalUmum)
    {
        abort_if(Gate::denies('jurnal_umum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jurnalUmum->load('akun');

        return view('frontend.jurnalUmums.show', compact('jurnalUmum'));
    }

    public function destroy(JurnalUmum $jurnalUmum)
    {
        abort_if(Gate::denies('jurnal_umum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jurnalUmum->delete();

        return back();
    }

    public function massDestroy(MassDestroyJurnalUmumRequest $request)
    {
        JurnalUmum::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
