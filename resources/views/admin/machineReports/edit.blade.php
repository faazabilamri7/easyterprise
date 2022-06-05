@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.machineReport.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.machine-reports.update", [$machineReport->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="production_plan_id">{{ trans('cruds.machineReport.fields.production_plan') }}</label>
                <select class="form-control select2 {{ $errors->has('production_plan') ? 'is-invalid' : '' }}" name="production_plan_id" id="production_plan_id" required>
                    @foreach($production_plans as $id => $entry)
                        <option value="{{ $id }}" {{ (old('production_plan_id') ? old('production_plan_id') : $machineReport->production_plan->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('production_plan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('production_plan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.machineReport.fields.production_plan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama_mesin">{{ trans('cruds.machineReport.fields.nama_mesin') }}</label>
                <input class="form-control {{ $errors->has('nama_mesin') ? 'is-invalid' : '' }}" type="text" name="nama_mesin" id="nama_mesin" value="{{ old('nama_mesin', $machineReport->nama_mesin) }}" required>
                @if($errors->has('nama_mesin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_mesin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.machineReport.fields.nama_mesin_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.machineReport.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\MachineReport::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $machineReport->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.machineReport.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection