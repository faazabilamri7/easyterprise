@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productionMonitoring.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.production-monitorings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.productionMonitoring.fields.id') }}
                        </th>
                        <td>
                            {{ $productionMonitoring->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productionMonitoring.fields.production_plan') }}
                        </th>
                        <td>
                            {{ $productionMonitoring->production_plan->tugas ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productionMonitoring.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\ProductionMonitoring::STATUS_SELECT[$productionMonitoring->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.production-monitorings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection