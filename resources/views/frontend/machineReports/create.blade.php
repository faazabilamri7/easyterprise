@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.machineReport.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.machine-reports.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="production_plan_id">{{ trans('cruds.machineReport.fields.production_plan') }}</label>
                            <select class="form-control select2" name="production_plan_id" id="production_plan_id" required>
                                @foreach($production_plans as $id => $entry)
                                    <option value="{{ $id }}" {{ old('production_plan_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <input class="form-control" type="text" name="nama_mesin" id="nama_mesin" value="{{ old('nama_mesin', '') }}" required>
                            @if($errors->has('nama_mesin'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nama_mesin') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.machineReport.fields.nama_mesin_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.machineReport.fields.status') }}</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\MachineReport::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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

        </div>
    </div>
</div>
@endsection