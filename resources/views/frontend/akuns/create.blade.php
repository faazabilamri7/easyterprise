@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.akun.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.akuns.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="nama">{{ trans('cruds.akun.fields.nama') }}</label>
                            <input class="form-control" type="text" name="nama" id="nama" value="{{ old('nama', '') }}">
                            @if($errors->has('nama'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nama') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.akun.fields.nama_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="jenis_akun">{{ trans('cruds.akun.fields.jenis_akun') }}</label>
                            <input class="form-control" type="text" name="jenis_akun" id="jenis_akun" value="{{ old('jenis_akun', '') }}">
                            @if($errors->has('jenis_akun'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('jenis_akun') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection