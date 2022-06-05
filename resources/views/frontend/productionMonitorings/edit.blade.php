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
                            <label class="required" for="production_plan_id">{{ trans('cruds.productionMonitoring.fields.production_plan') }}</label>
                            <select class="form-control select2" name="production_plan_id" id="production_plan_id" required>
                                @foreach($production_plans as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('production_plan_id') ? old('production_plan_id') : $productionMonitoring->production_plan->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('production_plan'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('production_plan') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.productionMonitoring.fields.production_plan_helper') }}</span>
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