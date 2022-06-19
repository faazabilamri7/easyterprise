<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWarehouseInsightRequest;
use App\Http\Requests\StoreWarehouseInsightRequest;
use App\Http\Requests\UpdateWarehouseInsightRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WarehouseInsightController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('warehouse_insight_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.warehouseInsights.index');
    }

    public function create()
    {
        abort_if(Gate::denies('warehouse_insight_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.warehouseInsights.create');
    }

    public function store(StoreWarehouseInsightRequest $request)
    {
        $warehouseInsight = WarehouseInsight::create($request->all());

        return redirect()->route('admin.warehouse-insights.index');
    }

    public function edit(WarehouseInsight $warehouseInsight)
    {
        abort_if(Gate::denies('warehouse_insight_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.warehouseInsights.edit', compact('warehouseInsight'));
    }

    public function update(UpdateWarehouseInsightRequest $request, WarehouseInsight $warehouseInsight)
    {
        $warehouseInsight->update($request->all());

        return redirect()->route('admin.warehouse-insights.index');
    }

    public function show(WarehouseInsight $warehouseInsight)
    {
        abort_if(Gate::denies('warehouse_insight_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.warehouseInsights.show', compact('warehouseInsight'));
    }

    public function destroy(WarehouseInsight $warehouseInsight)
    {
        abort_if(Gate::denies('warehouse_insight_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $warehouseInsight->delete();

        return back();
    }

    public function massDestroy(MassDestroyWarehouseInsightRequest $request)
    {
        WarehouseInsight::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
