@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.qualityControl.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.quality-controls.update", [$qualityControl->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="id_quality_control">{{ trans('cruds.qualityControl.fields.id_quality_control') }}</label>
                            <input class="form-control" type="text" name="id_quality_control" id="id_quality_control" value="{{ old('id_quality_control', $qualityControl->id_quality_control) }}">
                            @if($errors->has('id_quality_control'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('id_quality_control') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.qualityControl.fields.id_quality_control_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="id_production_monitoring_id">{{ trans('cruds.qualityControl.fields.id_production_monitoring') }}</label>
                            <select class="form-control select2" name="id_production_monitoring_id" id="id_production_monitoring_id">
                                @foreach($id_production_monitorings as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('id_production_monitoring_id') ? old('id_production_monitoring_id') : $qualityControl->id_production_monitoring->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <input class="form-control" type="number" name="qty" id="qty" value="{{ old('qty', $qualityControl->qty) }}" step="1">
                            @if($errors->has('qty'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('qty') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.qualityControl.fields.qty_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.qualityControl.fields.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\QualityControl::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', $qualityControl->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection