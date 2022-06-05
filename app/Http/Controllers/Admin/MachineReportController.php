<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMachineReportRequest;
use App\Http\Requests\StoreMachineReportRequest;
use App\Http\Requests\UpdateMachineReportRequest;
use App\Models\MachineReport;
use App\Models\ProductionPlan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MachineReportController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('machine_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $machineReports = MachineReport::with(['production_plan'])->get();

        return view('admin.machineReports.index', compact('machineReports'));
    }

    public function create()
    {
        abort_if(Gate::denies('machine_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $production_plans = ProductionPlan::pluck('tugas', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.machineReports.create', compact('production_plans'));
    }

    public function store(StoreMachineReportRequest $request)
    {
        $machineReport = MachineReport::create($request->all());

        return redirect()->route('admin.machine-reports.index');
    }

    public function edit(MachineReport $machineReport)
    {
        abort_if(Gate::denies('machine_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $production_plans = ProductionPlan::pluck('tugas', 'id')->prepend(trans('global.pleaseSelect'), '');

        $machineReport->load('production_plan');

        return view('admin.machineReports.edit', compact('machineReport', 'production_plans'));
    }

    public function update(UpdateMachineReportRequest $request, MachineReport $machineReport)
    {
        $machineReport->update($request->all());

        return redirect()->route('admin.machine-reports.index');
    }

    public function show(MachineReport $machineReport)
    {
        abort_if(Gate::denies('machine_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $machineReport->load('production_plan');

        return view('admin.machineReports.show', compact('machineReport'));
    }

    public function destroy(MachineReport $machineReport)
    {
        abort_if(Gate::denies('machine_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $machineReport->delete();

        return back();
    }

    public function massDestroy(MassDestroyMachineReportRequest $request)
    {
        MachineReport::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
