<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTransferMaterialRequest;
use App\Http\Requests\StoreTransferMaterialRequest;
use App\Http\Requests\UpdateTransferMaterialRequest;
use App\Models\ListOfMaterial;
use App\Models\TransferMaterial;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransferMaterialController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('transfer_material_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transferMaterials = TransferMaterial::with(['id_list_of_material'])->get();

        return view('frontend.transferMaterials.index', compact('transferMaterials'));
    }

    public function create()
    {
        abort_if(Gate::denies('transfer_material_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_list_of_materials = ListOfMaterial::pluck('id_list_of_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.transferMaterials.create', compact('id_list_of_materials'));
    }

    public function store(StoreTransferMaterialRequest $request)
    {
        $transferMaterial = TransferMaterial::create($request->all());

        return redirect()->route('frontend.transfer-materials.index');
    }

    public function edit(TransferMaterial $transferMaterial)
    {
        abort_if(Gate::denies('transfer_material_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_list_of_materials = ListOfMaterial::pluck('id_list_of_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transferMaterial->load('id_list_of_material');

        return view('frontend.transferMaterials.edit', compact('id_list_of_materials', 'transferMaterial'));
    }

    public function update(UpdateTransferMaterialRequest $request, TransferMaterial $transferMaterial)
    {
        $transferMaterial->update($request->all());

        return redirect()->route('frontend.transfer-materials.index');
    }

    public function show(TransferMaterial $transferMaterial)
    {
        abort_if(Gate::denies('transfer_material_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transferMaterial->load('id_list_of_material');

        return view('frontend.transferMaterials.show', compact('transferMaterial'));
    }

    public function destroy(TransferMaterial $transferMaterial)
    {
        abort_if(Gate::denies('transfer_material_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transferMaterial->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransferMaterialRequest $request)
    {
        TransferMaterial::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
