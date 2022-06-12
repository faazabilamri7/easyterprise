@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.transaksiKeuangan.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.transaksi-keuangans.update", [$transaksiKeuangan->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="kas_bank_id">{{ trans('cruds.transaksiKeuangan.fields.kas_bank') }}</label>
                            <select class="form-control select2" name="kas_bank_id" id="kas_bank_id" required>
                                @foreach($kas_banks as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('kas_bank_id') ? old('kas_bank_id') : $transaksiKeuangan->kas_bank->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('kas_bank'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('kas_bank') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaksiKeuangan.fields.kas_bank_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">{{ trans('cruds.transaksiKeuangan.fields.tanggal') }}</label>
                            <input class="form-control date" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $transaksiKeuangan->tanggal) }}">
                            @if($errors->has('tanggal'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tanggal') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaksiKeuangan.fields.tanggal_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="desc">{{ trans('cruds.transaksiKeuangan.fields.desc') }}</label>
                            <input class="form-control" type="text" name="desc" id="desc" value="{{ old('desc', $transaksiKeuangan->desc) }}">
                            @if($errors->has('desc'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('desc') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaksiKeuangan.fields.desc_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="nominal">{{ trans('cruds.transaksiKeuangan.fields.nominal') }}</label>
                            <input class="form-control" type="number" name="nominal" id="nominal" value="{{ old('nominal', $transaksiKeuangan->nominal) }}" step="0.01">
                            @if($errors->has('nominal'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nominal') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaksiKeuangan.fields.nominal_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="jenis_pembayaran">{{ trans('cruds.transaksiKeuangan.fields.jenis_pembayaran') }}</label>
                            <input class="form-control" type="text" name="jenis_pembayaran" id="jenis_pembayaran" value="{{ old('jenis_pembayaran', $transaksiKeuangan->jenis_pembayaran) }}">
                            @if($errors->has('jenis_pembayaran'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('jenis_pembayaran') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaksiKeuangan.fields.jenis_pembayaran_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="qty">{{ trans('cruds.transaksiKeuangan.fields.qty') }}</label>
                            <input class="form-control" type="number" name="qty" id="qty" value="{{ old('qty', $transaksiKeuangan->qty) }}" step="1">
                            @if($errors->has('qty'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('qty') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaksiKeuangan.fields.qty_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="harga_unit">{{ trans('cruds.transaksiKeuangan.fields.harga_unit') }}</label>
                            <input class="form-control" type="number" name="harga_unit" id="harga_unit" value="{{ old('harga_unit', $transaksiKeuangan->harga_unit) }}" step="0.01">
                            @if($errors->has('harga_unit'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('harga_unit') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaksiKeuangan.fields.harga_unit_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="total">{{ trans('cruds.transaksiKeuangan.fields.total') }}</label>
                            <input class="form-control" type="number" name="total" id="total" value="{{ old('total', $transaksiKeuangan->total) }}" step="0.01">
                            @if($errors->has('total'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('total') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaksiKeuangan.fields.total_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="sales_product_id">{{ trans('cruds.transaksiKeuangan.fields.sales_product') }}</label>
                            <select class="form-control select2" name="sales_product_id" id="sales_product_id" required>
                                @foreach($sales_products as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('sales_product_id') ? old('sales_product_id') : $transaksiKeuangan->sales_product->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('sales_product'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sales_product') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transaksiKeuangan.fields.sales_product_helper') }}</span>
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