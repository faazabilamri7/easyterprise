@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.kasBank.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.kas-banks.update", [$kasBank->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="tanggal">{{ trans('cruds.kasBank.fields.tanggal') }}</label>
                            <input class="form-control date" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $kasBank->tanggal) }}">
                            @if($errors->has('tanggal'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tanggal') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.kasBank.fields.tanggal_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="reff">{{ trans('cruds.kasBank.fields.reff') }}</label>
                            <input class="form-control" type="text" name="reff" id="reff" value="{{ old('reff', $kasBank->reff) }}">
                            @if($errors->has('reff'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('reff') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.kasBank.fields.reff_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="transaksi">{{ trans('cruds.kasBank.fields.transaksi') }}</label>
                            <input class="form-control" type="number" name="transaksi" id="transaksi" value="{{ old('transaksi', $kasBank->transaksi) }}" step="0.01">
                            @if($errors->has('transaksi'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('transaksi') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.kasBank.fields.transaksi_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">{{ trans('cruds.kasBank.fields.jumlah') }}</label>
                            <input class="form-control" type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', $kasBank->jumlah) }}" step="1">
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

        </div>
    </div>
</div>
@endsection