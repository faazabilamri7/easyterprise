@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productionPlan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.production-plans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.productionPlan.fields.id') }}
                        </th>
                        <td>
                            {{ $productionPlan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productionPlan.fields.tugas') }}
                        </th>
                        <td>
                            {{ $productionPlan->tugas }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productionPlan.fields.tanggal_mulai') }}
                        </th>
                        <td>
                            {{ $productionPlan->tanggal_mulai }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productionPlan.fields.durasi') }}
                        </th>
                        <td>
                            {{ $productionPlan->durasi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productionPlan.fields.rincian') }}
                        </th>
                        <td>
                            {{ $productionPlan->rincian }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.production-plans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#production_plan_list_of_materials" role="tab" data-toggle="tab">
                {{ trans('cruds.listOfMaterial.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#production_plan_production_monitorings" role="tab" data-toggle="tab">
                {{ trans('cruds.productionMonitoring.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#production_plan_machine_reports" role="tab" data-toggle="tab">
                {{ trans('cruds.machineReport.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="production_plan_list_of_materials">
            @includeIf('admin.productionPlans.relationships.productionPlanListOfMaterials', ['listOfMaterials' => $productionPlan->productionPlanListOfMaterials])
        </div>
        <div class="tab-pane" role="tabpanel" id="production_plan_production_monitorings">
            @includeIf('admin.productionPlans.relationships.productionPlanProductionMonitorings', ['productionMonitorings' => $productionPlan->productionPlanProductionMonitorings])
        </div>
        <div class="tab-pane" role="tabpanel" id="production_plan_machine_reports">
            @includeIf('admin.productionPlans.relationships.productionPlanMachineReports', ['machineReports' => $productionPlan->productionPlanMachineReports])
        </div>
    </div>
</div>

@endsection