<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyNecaraSaldoRequest;
use App\Http\Requests\StoreNecaraSaldoRequest;
use App\Http\Requests\UpdateNecaraSaldoRequest;
use App\Models\Akun;
use App\Models\NecaraSaldo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NecaraSaldoController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('necara_saldo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $necaraSaldos = NecaraSaldo::with(['akun'])->get();

        return view('frontend.necaraSaldos.index', compact('necaraSaldos'));
    }

    public function create()
    {
        abort_if(Gate::denies('necara_saldo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akuns = Akun::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.necaraSaldos.create', compact('akuns'));
    }

    public function store(StoreNecaraSaldoRequest $request)
    {
        $necaraSaldo = NecaraSaldo::create($request->all());

        return redirect()->route('frontend.necara-saldos.index');
    }

    public function edit(NecaraSaldo $necaraSaldo)
    {
        abort_if(Gate::denies('necara_saldo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akuns = Akun::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $necaraSaldo->load('akun');

        return view('frontend.necaraSaldos.edit', compact('akuns', 'necaraSaldo'));
    }

    public function update(UpdateNecaraSaldoRequest $request, NecaraSaldo $necaraSaldo)
    {
        $necaraSaldo->update($request->all());

        return redirect()->route('frontend.necara-saldos.index');
    }

    public function show(NecaraSaldo $necaraSaldo)
    {
        abort_if(Gate::denies('necara_saldo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $necaraSaldo->load('akun');

        return view('frontend.necaraSaldos.show', compact('necaraSaldo'));
    }

    public function destroy(NecaraSaldo $necaraSaldo)
    {
        abort_if(Gate::denies('necara_saldo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $necaraSaldo->delete();

        return back();
    }

    public function massDestroy(MassDestroyNecaraSaldoRequest $request)
    {
        NecaraSaldo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
