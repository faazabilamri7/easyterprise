@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.machineReport.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.machine-reports.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="id_mesin">{{ trans('cruds.machineReport.fields.id_mesin') }}</label>
                <input class="form-control {{ $errors->has('id_mesin') ? 'is-invalid' : '' }}" type="text" name="id_mesin" id="id_mesin" value="{{ old('id_mesin', '') }}">
                @if($errors->has('id_mesin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_mesin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.machineReport.fields.id_mesin_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama_mesin">{{ trans('cruds.machineReport.fields.nama_mesin') }}</label>
                <input class="form-control {{ $errors->has('nama_mesin') ? 'is-invalid' : '' }}" type="text" name="nama_mesin" id="nama_mesin" value="{{ old('nama_mesin', '') }}" required>
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



@endsection