<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProcurementInsightRequest;
use App\Http\Requests\StoreProcurementInsightRequest;
use App\Http\Requests\UpdateProcurementInsightRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProcurementInsightController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('procurement_insight_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.procurementInsights.index');
    }

    public function create()
    {
        abort_if(Gate::denies('procurement_insight_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.procurementInsights.create');
    }

    public function store(StoreProcurementInsightRequest $request)
    {
        $procurementInsight = ProcurementInsight::create($request->all());

        return redirect()->route('admin.procurement-insights.index');
    }

    public function edit(ProcurementInsight $procurementInsight)
    {
        abort_if(Gate::denies('procurement_insight_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.procurementInsights.edit', compact('procurementInsight'));
    }

    public function update(UpdateProcurementInsightRequest $request, ProcurementInsight $procurementInsight)
    {
        $procurementInsight->update($request->all());

        return redirect()->route('admin.procurement-insights.index');
    }

    public function show(ProcurementInsight $procurementInsight)
    {
        abort_if(Gate::denies('procurement_insight_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.procurementInsights.show', compact('procurementInsight'));
    }

    public function destroy(ProcurementInsight $procurementInsight)
    {
        abort_if(Gate::denies('procurement_insight_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $procurementInsight->delete();

        return back();
    }

    public function massDestroy(MassDestroyProcurementInsightRequest $request)
    {
        ProcurementInsight::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
