@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.qualityControl.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.quality-controls.update", [$qualityControl->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="id_quality_control">{{ trans('cruds.qualityControl.fields.id_quality_control') }}</label>
                <input class="form-control {{ $errors->has('id_quality_control') ? 'is-invalid' : '' }}" type="text" name="id_quality_control" id="id_quality_control" value="{{ old('id_quality_control', $qualityControl->id_quality_control) }}" required>
                @if($errors->has('id_quality_control'))
                    <span class="text-danger">{{ $errors->first('id_quality_control') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qualityControl.fields.id_quality_control_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="id_production_monitoring_id">{{ trans('cruds.qualityControl.fields.id_production_monitoring') }}</label>
                <select class="form-control select2 {{ $errors->has('id_production_monitoring') ? 'is-invalid' : '' }}" name="id_production_monitoring_id" id="id_production_monitoring_id" required>
                    @foreach($id_production_monitorings as $id => $entry)
                        <option value="{{ $id }}" {{ (old('id_production_monitoring_id') ? old('id_production_monitoring_id') : $qualityControl->id_production_monitoring->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_production_monitoring'))
                    <span class="text-danger">{{ $errors->first('id_production_monitoring') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qualityControl.fields.id_production_monitoring_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qty">{{ trans('cruds.qualityControl.fields.qty') }}</label>
                <input class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}" type="number" name="qty" id="qty" value="{{ old('qty', $qualityControl->qty) }}" step="1">
                @if($errors->has('qty'))
                    <span class="text-danger">{{ $errors->first('qty') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qualityControl.fields.qty_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.qualityControl.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\QualityControl::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $qualityControl->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qualityControl.fields.status_helper') }}</span>
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