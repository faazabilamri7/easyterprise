@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.qualityControl.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.quality-controls.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="id_quality_control">{{ trans('cruds.qualityControl.fields.id_quality_control') }}</label>
                <input class="form-control {{ $errors->has('id_quality_control') ? 'is-invalid' : '' }}" type="text" name="id_quality_control" id="id_quality_control" value="{{ old('id_quality_control', '') }}" required>
                @if($errors->has('id_quality_control'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_quality_control') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.qualityControl.fields.id_quality_control_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="id_production_monitoring_id">{{ trans('cruds.qualityControl.fields.id_production_monitoring') }}</label>
                <select class="form-control select2 {{ $errors->has('id_production_monitoring') ? 'is-invalid' : '' }}" name="id_production_monitoring_id" id="id_production_monitoring_id" required>
                    @foreach($id_production_monitorings as $id => $entry)
                        <option value="{{ $id }}" {{ old('id_production_monitoring_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_production_monitoring'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_production_monitoring') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.qualityControl.fields.id_production_monitoring_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qty">{{ trans('cruds.qualityControl.fields.qty') }}</label>
                <input class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}" type="number" name="qty" id="qty" value="{{ old('qty', '') }}" step="1">
                @if($errors->has('qty'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qty') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.qualityControl.fields.qty_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qty_failed">{{ trans('cruds.qualityControl.fields.qty_failed') }}</label>
                <input class="form-control {{ $errors->has('qty_failed') ? 'is-invalid' : '' }}" type="text" name="qty_failed" id="qty_failed" value="{{ old('qty_failed', '') }}">
                @if($errors->has('qty_failed'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qty_failed') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.qualityControl.fields.qty_failed_helper') }}</span>
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