<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDashboardSalesMarketingRequest;
use App\Http\Requests\StoreDashboardSalesMarketingRequest;
use App\Http\Requests\UpdateDashboardSalesMarketingRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DashboardSalesMarketingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dashboard_sales_marketing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dashboardSalesMarketings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('dashboard_sales_marketing_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dashboardSalesMarketings.create');
    }

    public function store(StoreDashboardSalesMarketingRequest $request)
    {
        $dashboardSalesMarketing = DashboardSalesMarketing::create($request->all());

        return redirect()->route('admin.dashboard-sales-marketings.index');
    }

    public function edit(DashboardSalesMarketing $dashboardSalesMarketing)
    {
        abort_if(Gate::denies('dashboard_sales_marketing_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dashboardSalesMarketings.edit', compact('dashboardSalesMarketing'));
    }

    public function update(UpdateDashboardSalesMarketingRequest $request, DashboardSalesMarketing $dashboardSalesMarketing)
    {
        $dashboardSalesMarketing->update($request->all());

        return redirect()->route('admin.dashboard-sales-marketings.index');
    }

    public function show(DashboardSalesMarketing $dashboardSalesMarketing)
    {
        abort_if(Gate::denies('dashboard_sales_marketing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dashboardSalesMarketings.show', compact('dashboardSalesMarketing'));
    }

    public function destroy(DashboardSalesMarketing $dashboardSalesMarketing)
    {
        abort_if(Gate::denies('dashboard_sales_marketing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dashboardSalesMarketing->delete();

        return back();
    }

    public function massDestroy(MassDestroyDashboardSalesMarketingRequest $request)
    {
        DashboardSalesMarketing::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
