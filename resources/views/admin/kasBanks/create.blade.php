@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.kasBank.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.kas-banks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tanggal">{{ trans('cruds.kasBank.fields.tanggal') }}</label>
                <input class="form-control date {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal') }}">
                @if($errors->has('tanggal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kasBank.fields.tanggal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reff">{{ trans('cruds.kasBank.fields.reff') }}</label>
                <input class="form-control {{ $errors->has('reff') ? 'is-invalid' : '' }}" type="text" name="reff" id="reff" value="{{ old('reff', '') }}">
                @if($errors->has('reff'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reff') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kasBank.fields.reff_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transaksi">{{ trans('cruds.kasBank.fields.transaksi') }}</label>
                <input class="form-control {{ $errors->has('transaksi') ? 'is-invalid' : '' }}" type="number" name="transaksi" id="transaksi" value="{{ old('transaksi', '') }}" step="0.01">
                @if($errors->has('transaksi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transaksi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kasBank.fields.transaksi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jumlah">{{ trans('cruds.kasBank.fields.jumlah') }}</label>
                <input class="form-control {{ $errors->has('jumlah') ? 'is-invalid' : '' }}" type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', '') }}" step="1">
                @if($errors->has('jumlah'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jumlah') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.kasBank.fields.jumlah_helper') }}</span>
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