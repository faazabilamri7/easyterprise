<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductionPlanRequest;
use App\Http\Requests\StoreProductionPlanRequest;
use App\Http\Requests\UpdateProductionPlanRequest;
use App\Models\ProductionPlan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductionPlanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('production_plan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productionPlans = ProductionPlan::all();

        return view('frontend.productionPlans.index', compact('productionPlans'));
    }

    public function create()
    {
        abort_if(Gate::denies('production_plan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.productionPlans.create');
    }

    public function store(StoreProductionPlanRequest $request)
    {
        $productionPlan = ProductionPlan::create($request->all());

        return redirect()->route('frontend.production-plans.index');
    }

    public function edit(ProductionPlan $productionPlan)
    {
        abort_if(Gate::denies('production_plan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.productionPlans.edit', compact('productionPlan'));
    }

    public function update(UpdateProductionPlanRequest $request, ProductionPlan $productionPlan)
    {
        $productionPlan->update($request->all());

        return redirect()->route('frontend.production-plans.index');
    }

    public function show(ProductionPlan $productionPlan)
    {
        abort_if(Gate::denies('production_plan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productionPlan->load('productionPlanListOfMaterials', 'productionPlanProductionMonitorings', 'productionPlanMachineReports');

        return view('frontend.productionPlans.show', compact('productionPlan'));
    }

    public function destroy(ProductionPlan $productionPlan)
    {
        abort_if(Gate::denies('production_plan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productionPlan->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductionPlanRequest $request)
    {
        ProductionPlan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
