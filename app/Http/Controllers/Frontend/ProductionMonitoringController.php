<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductionMonitoringRequest;
use App\Http\Requests\StoreProductionMonitoringRequest;
use App\Http\Requests\UpdateProductionMonitoringRequest;
use App\Models\ListOfMaterial;
use App\Models\ProductionMonitoring;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductionMonitoringController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('production_monitoring_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productionMonitorings = ProductionMonitoring::with(['id_list_of_material'])->get();

        return view('frontend.productionMonitorings.index', compact('productionMonitorings'));
    }

    public function create()
    {
        abort_if(Gate::denies('production_monitoring_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_list_of_materials = ListOfMaterial::pluck('id_list_of_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.productionMonitorings.create', compact('id_list_of_materials'));
    }

    public function store(StoreProductionMonitoringRequest $request)
    {
        $productionMonitoring = ProductionMonitoring::create($request->all());

        return redirect()->route('frontend.production-monitorings.index');
    }

    public function edit(ProductionMonitoring $productionMonitoring)
    {
        abort_if(Gate::denies('production_monitoring_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_list_of_materials = ListOfMaterial::pluck('id_list_of_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $productionMonitoring->load('id_list_of_material');

        return view('frontend.productionMonitorings.edit', compact('id_list_of_materials', 'productionMonitoring'));
    }

    public function update(UpdateProductionMonitoringRequest $request, ProductionMonitoring $productionMonitoring)
    {
        $productionMonitoring->update($request->all());

        return redirect()->route('frontend.production-monitorings.index');
    }

    public function show(ProductionMonitoring $productionMonitoring)
    {
        abort_if(Gate::denies('production_monitoring_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productionMonitoring->load('id_list_of_material', 'idProductionMonitoringQualityControls');

        return view('frontend.productionMonitorings.show', compact('productionMonitoring'));
    }

    public function destroy(ProductionMonitoring $productionMonitoring)
    {
        abort_if(Gate::denies('production_monitoring_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productionMonitoring->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductionMonitoringRequest $request)
    {
        ProductionMonitoring::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
