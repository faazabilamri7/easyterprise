<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductionRequest;
use App\Http\Requests\StoreProductionRequest;
use App\Http\Requests\UpdateProductionRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('production_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('production_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productions.create');
    }

    public function store(StoreProductionRequest $request)
    {
        $production = Production::create($request->all());

        return redirect()->route('admin.productions.index');
    }

    public function edit(Production $production)
    {
        abort_if(Gate::denies('production_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productions.edit', compact('production'));
    }

    public function update(UpdateProductionRequest $request, Production $production)
    {
        $production->update($request->all());

        return redirect()->route('admin.productions.index');
    }

    public function show(Production $production)
    {
        abort_if(Gate::denies('production_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productions.show', compact('production'));
    }

    public function destroy(Production $production)
    {
        abort_if(Gate::denies('production_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $production->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductionRequest $request)
    {
        Production::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
