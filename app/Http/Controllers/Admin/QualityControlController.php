<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQualityControlRequest;
use App\Http\Requests\StoreQualityControlRequest;
use App\Http\Requests\UpdateQualityControlRequest;
use App\Models\ProductionMonitoring;
use App\Models\QualityControl;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QualityControlController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('quality_control_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qualityControls = QualityControl::with(['id_production_monitoring'])->get();

        return view('admin.qualityControls.index', compact('qualityControls'));
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

        $qualityControl->load('id_production_monitoring');

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
