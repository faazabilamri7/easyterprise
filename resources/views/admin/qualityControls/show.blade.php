@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.qualityControl.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.quality-controls.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.qualityControl.fields.id') }}
                        </th>
                        <td>
                            {{ $qualityControl->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qualityControl.fields.id_quality_control') }}
                        </th>
                        <td>
                            {{ $qualityControl->id_quality_control }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qualityControl.fields.id_production_monitoring') }}
                        </th>
                        <td>
                            {{ $qualityControl->id_production_monitoring->id_production_monitoring ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qualityControl.fields.qty') }}
                        </th>
                        <td>
                            {{ $qualityControl->qty }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qualityControl.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\QualityControl::STATUS_SELECT[$qualityControl->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.quality-controls.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection