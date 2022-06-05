<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKasBankRequest;
use App\Http\Requests\StoreKasBankRequest;
use App\Http\Requests\UpdateKasBankRequest;
use App\Models\KasBank;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class KasBankController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('kas_bank_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kasBanks = KasBank::all();

        return view('frontend.kasBanks.index', compact('kasBanks'));
    }

    public function create()
    {
        abort_if(Gate::denies('kas_bank_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.kasBanks.create');
    }

    public function store(StoreKasBankRequest $request)
    {
        $kasBank = KasBank::create($request->all());

        return redirect()->route('frontend.kas-banks.index');
    }

    public function edit(KasBank $kasBank)
    {
        abort_if(Gate::denies('kas_bank_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.kasBanks.edit', compact('kasBank'));
    }

    public function update(UpdateKasBankRequest $request, KasBank $kasBank)
    {
        $kasBank->update($request->all());

        return redirect()->route('frontend.kas-banks.index');
    }

    public function show(KasBank $kasBank)
    {
        abort_if(Gate::denies('kas_bank_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.kasBanks.show', compact('kasBank'));
    }

    public function destroy(KasBank $kasBank)
    {
        abort_if(Gate::denies('kas_bank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kasBank->delete();

        return back();
    }

    public function massDestroy(MassDestroyKasBankRequest $request)
    {
        KasBank::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
