@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.biayaProduksi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.biaya-produksis.update", [$biayaProduksi->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="tanggal">{{ trans('cruds.biayaProduksi.fields.tanggal') }}</label>
                <input class="form-control date {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $biayaProduksi->tanggal) }}">
                @if($errors->has('tanggal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.biayaProduksi.fields.tanggal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="periode">{{ trans('cruds.biayaProduksi.fields.periode') }}</label>
                <input class="form-control {{ $errors->has('periode') ? 'is-invalid' : '' }}" type="text" name="periode" id="periode" value="{{ old('periode', $biayaProduksi->periode) }}">
                @if($errors->has('periode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('periode') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.biayaProduksi.fields.periode_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="desc">{{ trans('cruds.biayaProduksi.fields.desc') }}</label>
                <input class="form-control {{ $errors->has('desc') ? 'is-invalid' : '' }}" type="text" name="desc" id="desc" value="{{ old('desc', $biayaProduksi->desc) }}">
                @if($errors->has('desc'))
                    <div class="invalid-feedback">
                        {{ $errors->first('desc') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.biayaProduksi.fields.desc_helper') }}</span>
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