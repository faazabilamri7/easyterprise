<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPurchaseRequitionRequest;
use App\Http\Requests\StorePurchaseRequitionRequest;
use App\Http\Requests\UpdatePurchaseRequitionRequest;
use App\Models\ListOfMaterial;
use App\Models\Material;
use App\Models\PurchaseRequition;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PurchaseRequitionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('purchase_requition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseRequitions = PurchaseRequition::with(['id_list_of_material', 'material_1', 'material_2', 'material_3', 'material_4', 'material_5', 'material_6'])->get();

        return view('frontend.purchaseRequitions.index', compact('purchaseRequitions'));
    }

    public function create()
    {
        abort_if(Gate::denies('purchase_requition_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_list_of_materials = ListOfMaterial::pluck('id_list_of_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_1s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_2s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_3s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_4s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_5s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_6s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.purchaseRequitions.create', compact('id_list_of_materials', 'material_1s', 'material_2s', 'material_3s', 'material_4s', 'material_5s', 'material_6s'));
    }

    public function store(StorePurchaseRequitionRequest $request)
    {
        $purchaseRequition = PurchaseRequition::create($request->all());

        return redirect()->route('frontend.purchase-requitions.index');
    }

    public function edit(PurchaseRequition $purchaseRequition)
    {
        abort_if(Gate::denies('purchase_requition_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_list_of_materials = ListOfMaterial::pluck('id_list_of_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_1s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_2s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_3s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_4s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_5s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_6s = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchaseRequition->load('id_list_of_material', 'material_1', 'material_2', 'material_3', 'material_4', 'material_5', 'material_6');

        return view('frontend.purchaseRequitions.edit', compact('id_list_of_materials', 'material_1s', 'material_2s', 'material_3s', 'material_4s', 'material_5s', 'material_6s', 'purchaseRequition'));
    }

    public function update(UpdatePurchaseRequitionRequest $request, PurchaseRequition $purchaseRequition)
    {
        $purchaseRequition->update($request->all());

        return redirect()->route('frontend.purchase-requitions.index');
    }

    public function show(PurchaseRequition $purchaseRequition)
    {
        abort_if(Gate::denies('purchase_requition_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseRequition->load('id_list_of_material', 'material_1', 'material_2', 'material_3', 'material_4', 'material_5', 'material_6');

        return view('frontend.purchaseRequitions.show', compact('purchaseRequition'));
    }

    public function destroy(PurchaseRequition $purchaseRequition)
    {
        abort_if(Gate::denies('purchase_requition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseRequition->delete();

        return back();
    }

    public function massDestroy(MassDestroyPurchaseRequitionRequest $request)
    {
        PurchaseRequition::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
