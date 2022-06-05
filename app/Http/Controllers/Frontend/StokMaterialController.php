<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStokMaterialRequest;
use App\Http\Requests\StoreStokMaterialRequest;
use App\Http\Requests\UpdateStokMaterialRequest;
use App\Models\StokMaterial;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StokMaterialController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('stok_material_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stokMaterials = StokMaterial::all();

        return view('frontend.stokMaterials.index', compact('stokMaterials'));
    }

    public function create()
    {
        abort_if(Gate::denies('stok_material_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.stokMaterials.create');
    }

    public function store(StoreStokMaterialRequest $request)
    {
        $stokMaterial = StokMaterial::create($request->all());

        return redirect()->route('frontend.stok-materials.index');
    }

    public function edit(StokMaterial $stokMaterial)
    {
        abort_if(Gate::denies('stok_material_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.stokMaterials.edit', compact('stokMaterial'));
    }

    public function update(UpdateStokMaterialRequest $request, StokMaterial $stokMaterial)
    {
        $stokMaterial->update($request->all());

        return redirect()->route('frontend.stok-materials.index');
    }

    public function show(StokMaterial $stokMaterial)
    {
        abort_if(Gate::denies('stok_material_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.stokMaterials.show', compact('stokMaterial'));
    }

    public function destroy(StokMaterial $stokMaterial)
    {
        abort_if(Gate::denies('stok_material_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stokMaterial->delete();

        return back();
    }

    public function massDestroy(MassDestroyStokMaterialRequest $request)
    {
        StokMaterial::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
