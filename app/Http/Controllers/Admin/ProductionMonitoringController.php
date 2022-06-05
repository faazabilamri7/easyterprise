<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductionMonitoringRequest;
use App\Http\Requests\StoreProductionMonitoringRequest;
use App\Http\Requests\UpdateProductionMonitoringRequest;
use App\Models\ProductionMonitoring;
use App\Models\ProductionPlan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductionMonitoringController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('production_monitoring_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productionMonitorings = ProductionMonitoring::with(['production_plan'])->get();

        return view('admin.productionMonitorings.index', compact('productionMonitorings'));
    }

    public function create()
    {
        abort_if(Gate::denies('production_monitoring_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $production_plans = ProductionPlan::pluck('tugas', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.productionMonitorings.create', compact('production_plans'));
    }

    public function store(StoreProductionMonitoringRequest $request)
    {
        $productionMonitoring = ProductionMonitoring::create($request->all());

        return redirect()->route('admin.production-monitorings.index');
    }

    public function edit(ProductionMonitoring $productionMonitoring)
    {
        abort_if(Gate::denies('production_monitoring_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $production_plans = ProductionPlan::pluck('tugas', 'id')->prepend(trans('global.pleaseSelect'), '');

        $productionMonitoring->load('production_plan');

        return view('admin.productionMonitorings.edit', compact('productionMonitoring', 'production_plans'));
    }

    public function update(UpdateProductionMonitoringRequest $request, ProductionMonitoring $productionMonitoring)
    {
        $productionMonitoring->update($request->all());

        return redirect()->route('admin.production-monitorings.index');
    }

    public function show(ProductionMonitoring $productionMonitoring)
    {
        abort_if(Gate::denies('production_monitoring_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productionMonitoring->load('production_plan');

        return view('admin.productionMonitorings.show', compact('productionMonitoring'));
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
