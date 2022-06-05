@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.transferProduk.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.transfer-produks.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="nama_produk">{{ trans('cruds.transferProduk.fields.nama_produk') }}</label>
                            <input class="form-control" type="text" name="nama_produk" id="nama_produk" value="{{ old('nama_produk', '') }}">
                            @if($errors->has('nama_produk'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nama_produk') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transferProduk.fields.nama_produk_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.transferProduk.fields.transfer_dari') }}</label>
                            <select class="form-control" name="transfer_dari" id="transfer_dari">
                                <option value disabled {{ old('transfer_dari', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\TransferProduk::TRANSFER_DARI_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('transfer_dari', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('transfer_dari'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('transfer_dari') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transferProduk.fields.transfer_dari_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.transferProduk.fields.transfer_ke') }}</label>
                            <select class="form-control" name="transfer_ke" id="transfer_ke">
                                <option value disabled {{ old('transfer_ke', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\TransferProduk::TRANSFER_KE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('transfer_ke', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('transfer_ke'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('transfer_ke') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transferProduk.fields.transfer_ke_helper') }}</span>
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