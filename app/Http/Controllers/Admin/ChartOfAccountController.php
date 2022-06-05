<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyChartOfAccountRequest;
use App\Http\Requests\StoreChartOfAccountRequest;
use App\Http\Requests\UpdateChartOfAccountRequest;
use App\Models\ChartOfAccount;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChartOfAccountController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('chart_of_account_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chartOfAccounts = ChartOfAccount::all();

        return view('admin.chartOfAccounts.index', compact('chartOfAccounts'));
    }

    public function create()
    {
        abort_if(Gate::denies('chart_of_account_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.chartOfAccounts.create');
    }

    public function store(StoreChartOfAccountRequest $request)
    {
        $chartOfAccount = ChartOfAccount::create($request->all());

        return redirect()->route('admin.chart-of-accounts.index');
    }

    public function edit(ChartOfAccount $chartOfAccount)
    {
        abort_if(Gate::denies('chart_of_account_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.chartOfAccounts.edit', compact('chartOfAccount'));
    }

    public function update(UpdateChartOfAccountRequest $request, ChartOfAccount $chartOfAccount)
    {
        $chartOfAccount->update($request->all());

        return redirect()->route('admin.chart-of-accounts.index');
    }

    public function show(ChartOfAccount $chartOfAccount)
    {
        abort_if(Gate::denies('chart_of_account_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.chartOfAccounts.show', compact('chartOfAccount'));
    }

    public function destroy(ChartOfAccount $chartOfAccount)
    {
        abort_if(Gate::denies('chart_of_account_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chartOfAccount->delete();

        return back();
    }

    public function massDestroy(MassDestroyChartOfAccountRequest $request)
    {
        ChartOfAccount::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
