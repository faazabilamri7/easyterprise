@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.transferProduk.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.transfer-produks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="id_transfer_produk">{{ trans('cruds.transferProduk.fields.id_transfer_produk') }}</label>
                <input class="form-control {{ $errors->has('id_transfer_produk') ? 'is-invalid' : '' }}" type="text" name="id_transfer_produk" id="id_transfer_produk" value="{{ old('id_transfer_produk', '') }}" required>
                @if($errors->has('id_transfer_produk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_transfer_produk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transferProduk.fields.id_transfer_produk_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="id_quality_control_id">{{ trans('cruds.transferProduk.fields.id_quality_control') }}</label>
                <select class="form-control select2 {{ $errors->has('id_quality_control') ? 'is-invalid' : '' }}" name="id_quality_control_id" id="id_quality_control_id" required>
                    @foreach($id_quality_controls as $id => $entry)
                        <option value="{{ $id }}" {{ old('id_quality_control_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_quality_control'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_quality_control') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transferProduk.fields.id_quality_control_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="product_name_id">{{ trans('cruds.transferProduk.fields.product_name') }}</label>
                <select class="form-control select2 {{ $errors->has('product_name') ? 'is-invalid' : '' }}" name="product_name_id" id="product_name_id" required>
                    @foreach($product_names as $id => $entry)
                        <option value="{{ $id }}" {{ old('product_name_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transferProduk.fields.product_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_product_entry">{{ trans('cruds.transferProduk.fields.date_product_entry') }}</label>
                <input class="form-control date {{ $errors->has('date_product_entry') ? 'is-invalid' : '' }}" type="text" name="date_product_entry" id="date_product_entry" value="{{ old('date_product_entry') }}" required>
                @if($errors->has('date_product_entry'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_product_entry') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transferProduk.fields.date_product_entry_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qty">{{ trans('cruds.transferProduk.fields.qty') }}</label>
                <input class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}" type="number" name="qty" id="qty" value="{{ old('qty', '') }}" step="1">
                @if($errors->has('qty'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qty') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transferProduk.fields.qty_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.transferProduk.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TransferProduk::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transferProduk.fields.status_helper') }}</span>
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