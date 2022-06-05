<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAkunRequest;
use App\Http\Requests\StoreAkunRequest;
use App\Http\Requests\UpdateAkunRequest;
use App\Models\Akun;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AkunController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('akun_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akuns = Akun::all();

        return view('admin.akuns.index', compact('akuns'));
    }

    public function create()
    {
        abort_if(Gate::denies('akun_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.akuns.create');
    }

    public function store(StoreAkunRequest $request)
    {
        $akun = Akun::create($request->all());

        return redirect()->route('admin.akuns.index');
    }

    public function edit(Akun $akun)
    {
        abort_if(Gate::denies('akun_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.akuns.edit', compact('akun'));
    }

    public function update(UpdateAkunRequest $request, Akun $akun)
    {
        $akun->update($request->all());

        return redirect()->route('admin.akuns.index');
    }

    public function show(Akun $akun)
    {
        abort_if(Gate::denies('akun_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.akuns.show', compact('akun'));
    }

    public function destroy(Akun $akun)
    {
        abort_if(Gate::denies('akun_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akun->delete();

        return back();
    }

    public function massDestroy(MassDestroyAkunRequest $request)
    {
        Akun::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
