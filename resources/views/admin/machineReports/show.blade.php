@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.machineReport.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.machine-reports.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.machineReport.fields.id') }}
                        </th>
                        <td>
                            {{ $machineReport->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.machineReport.fields.id_mesin') }}
                        </th>
                        <td>
                            {{ $machineReport->id_mesin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.machineReport.fields.nama_mesin') }}
                        </th>
                        <td>
                            {{ $machineReport->nama_mesin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.machineReport.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\MachineReport::STATUS_SELECT[$machineReport->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.machine-reports.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection