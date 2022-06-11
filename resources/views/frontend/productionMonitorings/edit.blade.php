@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.productionMonitoring.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.production-monitorings.update", [$productionMonitoring->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="id_production_monitoring">{{ trans('cruds.productionMonitoring.fields.id_production_monitoring') }}</label>
                            <input class="form-control" type="text" name="id_production_monitoring" id="id_production_monitoring" value="{{ old('id_production_monitoring', $productionMonitoring->id_production_monitoring) }}" required>
                            @if($errors->has('id_production_monitoring'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('id_production_monitoring') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.productionMonitoring.fields.id_production_monitoring_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="id_list_of_material_id">{{ trans('cruds.productionMonitoring.fields.id_list_of_material') }}</label>
                            <select class="form-control select2" name="id_list_of_material_id" id="id_list_of_material_id" required>
                                @foreach($id_list_of_materials as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('id_list_of_material_id') ? old('id_list_of_material_id') : $productionMonitoring->id_list_of_material->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('id_list_of_material'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('id_list_of_material') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.productionMonitoring.fields.id_list_of_material_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.productionMonitoring.fields.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ProductionMonitoring::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', $productionMonitoring->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.productionMonitoring.fields.status_helper') }}</span>
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