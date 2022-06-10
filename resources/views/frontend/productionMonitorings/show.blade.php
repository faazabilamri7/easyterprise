@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.productionMonitoring.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.production-monitorings.index') }}">
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
                                        {{ trans('cruds.productionMonitoring.fields.id_production_monitoring') }}
                                    </th>
                                    <td>
                                        {{ $productionMonitoring->id_production_monitoring }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.productionMonitoring.fields.id_list_of_material') }}
                                    </th>
                                    <td>
                                        {{ $productionMonitoring->id_list_of_material->id_list_of_material ?? '' }}
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
                            <a class="btn btn-default" href="{{ route('frontend.production-monitorings.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection