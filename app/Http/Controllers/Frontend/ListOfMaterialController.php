<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyListOfMaterialRequest;
use App\Http\Requests\StoreListOfMaterialRequest;
use App\Http\Requests\UpdateListOfMaterialRequest;
use App\Models\ListOfMaterial;
use App\Models\Task;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ListOfMaterialController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('list_of_material_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listOfMaterials = ListOfMaterial::with(['id_production_plan'])->get();

        return view('frontend.listOfMaterials.index', compact('listOfMaterials'));
    }

    public function create()
    {
        abort_if(Gate::denies('list_of_material_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_production_plans = Task::pluck('id_production_plan', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.listOfMaterials.create', compact('id_production_plans'));
    }

    public function store(StoreListOfMaterialRequest $request)
    {
        $listOfMaterial = ListOfMaterial::create($request->all());

        return redirect()->route('frontend.list-of-materials.index');
    }

    public function edit(ListOfMaterial $listOfMaterial)
    {
        abort_if(Gate::denies('list_of_material_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_production_plans = Task::pluck('id_production_plan', 'id')->prepend(trans('global.pleaseSelect'), '');

        $listOfMaterial->load('id_production_plan');

        return view('frontend.listOfMaterials.edit', compact('id_production_plans', 'listOfMaterial'));
    }

    public function update(UpdateListOfMaterialRequest $request, ListOfMaterial $listOfMaterial)
    {
        $listOfMaterial->update($request->all());

        return redirect()->route('frontend.list-of-materials.index');
    }

    public function show(ListOfMaterial $listOfMaterial)
    {
        abort_if(Gate::denies('list_of_material_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listOfMaterial->load('id_production_plan', 'idListOfMaterialPurchaseRequitions', 'idListOfMaterialProductionMonitorings', 'idListOfMaterialTransferMaterials');

        return view('frontend.listOfMaterials.show', compact('listOfMaterial'));
    }

    public function destroy(ListOfMaterial $listOfMaterial)
    {
        abort_if(Gate::denies('list_of_material_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listOfMaterial->delete();

        return back();
    }

    public function massDestroy(MassDestroyListOfMaterialRequest $request)
    {
        ListOfMaterial::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
