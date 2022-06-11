@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.akun.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.akuns.update", [$akun->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nama">{{ trans('cruds.akun.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', $akun->nama) }}">
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.akun.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jenis_akun">{{ trans('cruds.akun.fields.jenis_akun') }}</label>
                <input class="form-control {{ $errors->has('jenis_akun') ? 'is-invalid' : '' }}" type="text" name="jenis_akun" id="jenis_akun" value="{{ old('jenis_akun', $akun->jenis_akun) }}">
                @if($errors->has('jenis_akun'))
                    <span class="text-danger">{{ $errors->first('jenis_akun') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.akun.fields.jenis_akun_helper') }}</span>
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