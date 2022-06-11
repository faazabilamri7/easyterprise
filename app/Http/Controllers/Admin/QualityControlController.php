<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyQualityControlRequest;
use App\Http\Requests\StoreQualityControlRequest;
use App\Http\Requests\UpdateQualityControlRequest;
use App\Models\ProductionMonitoring;
use App\Models\QualityControl;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class QualityControlController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('quality_control_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = QualityControl::with(['id_production_monitoring'])->select(sprintf('%s.*', (new QualityControl())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'quality_control_show';
                $editGate = 'quality_control_edit';
                $deleteGate = 'quality_control_delete';
                $crudRoutePart = 'quality-controls';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id_quality_control', function ($row) {
                return $row->id_quality_control ? $row->id_quality_control : '';
            });
            $table->addColumn('id_production_monitoring_id_production_monitoring', function ($row) {
                return $row->id_production_monitoring ? $row->id_production_monitoring->id_production_monitoring : '';
            });

            $table->editColumn('qty', function ($row) {
                return $row->qty ? $row->qty : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? QualityControl::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'id_production_monitoring']);

            return $table->make(true);
        }

        return view('admin.qualityControls.index');
    }

    public function create()
    {
        abort_if(Gate::denies('quality_control_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_production_monitorings = ProductionMonitoring::pluck('id_production_monitoring', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.qualityControls.create', compact('id_production_monitorings'));
    }

    public function store(StoreQualityControlRequest $request)
    {
        $qualityControl = QualityControl::create($request->all());

        return redirect()->route('admin.quality-controls.index');
    }

    public function edit(QualityControl $qualityControl)
    {
        abort_if(Gate::denies('quality_control_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_production_monitorings = ProductionMonitoring::pluck('id_production_monitoring', 'id')->prepend(trans('global.pleaseSelect'), '');

        $qualityControl->load('id_production_monitoring');

        return view('admin.qualityControls.edit', compact('id_production_monitorings', 'qualityControl'));
    }

    public function update(UpdateQualityControlRequest $request, QualityControl $qualityControl)
    {
        $qualityControl->update($request->all());

        return redirect()->route('admin.quality-controls.index');
    }

    public function show(QualityControl $qualityControl)
    {
        abort_if(Gate::denies('quality_control_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qualityControl->load('id_production_monitoring', 'idQualityControlTransferProduks');

        return view('admin.qualityControls.show', compact('qualityControl'));
    }

    public function destroy(QualityControl $qualityControl)
    {
        abort_if(Gate::denies('quality_control_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qualityControl->delete();

        return back();
    }

    public function massDestroy(MassDestroyQualityControlRequest $request)
    {
        QualityControl::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
