<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFinanceInsightRequest;
use App\Http\Requests\StoreFinanceInsightRequest;
use App\Http\Requests\UpdateFinanceInsightRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FinanceInsightController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('finance_insight_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.financeInsights.index');
    }

    public function create()
    {
        abort_if(Gate::denies('finance_insight_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.financeInsights.create');
    }

    public function store(StoreFinanceInsightRequest $request)
    {
        $financeInsight = FinanceInsight::create($request->all());

        return redirect()->route('admin.finance-insights.index');
    }

    public function edit(FinanceInsight $financeInsight)
    {
        abort_if(Gate::denies('finance_insight_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.financeInsights.edit', compact('financeInsight'));
    }

    public function update(UpdateFinanceInsightRequest $request, FinanceInsight $financeInsight)
    {
        $financeInsight->update($request->all());

        return redirect()->route('admin.finance-insights.index');
    }

    public function show(FinanceInsight $financeInsight)
    {
        abort_if(Gate::denies('finance_insight_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.financeInsights.show', compact('financeInsight'));
    }

    public function destroy(FinanceInsight $financeInsight)
    {
        abort_if(Gate::denies('finance_insight_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $financeInsight->delete();

        return back();
    }

    public function massDestroy(MassDestroyFinanceInsightRequest $request)
    {
        FinanceInsight::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
