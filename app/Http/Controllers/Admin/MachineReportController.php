<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyMachineReportRequest;
use App\Http\Requests\StoreMachineReportRequest;
use App\Http\Requests\UpdateMachineReportRequest;
use App\Models\MachineReport;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MachineReportController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('machine_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MachineReport::query()->select(sprintf('%s.*', (new MachineReport())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'machine_report_show';
                $editGate = 'machine_report_edit';
                $deleteGate = 'machine_report_delete';
                $crudRoutePart = 'machine-reports';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('id_mesin', function ($row) {
                return $row->id_mesin ? $row->id_mesin : '';
            });
            $table->editColumn('nama_mesin', function ($row) {
                return $row->nama_mesin ? $row->nama_mesin : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? MachineReport::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.machineReports.index');
    }

    public function create()
    {
        abort_if(Gate::denies('machine_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.machineReports.create');
    }

    public function store(StoreMachineReportRequest $request)
    {
        $machineReport = MachineReport::create($request->all());

        return redirect()->route('admin.machine-reports.index');
    }

    public function edit(MachineReport $machineReport)
    {
        abort_if(Gate::denies('machine_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.machineReports.edit', compact('machineReport'));
    }

    public function update(UpdateMachineReportRequest $request, MachineReport $machineReport)
    {
        $machineReport->update($request->all());

        return redirect()->route('admin.machine-reports.index');
    }

    public function show(MachineReport $machineReport)
    {
        abort_if(Gate::denies('machine_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $machineReport->load('idMesinTasks');

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
