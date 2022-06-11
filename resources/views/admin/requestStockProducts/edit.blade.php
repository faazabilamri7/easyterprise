@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.requestStockProduct.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.request-stock-products.update", [$requestStockProduct->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="id_request_product">{{ trans('cruds.requestStockProduct.fields.id_request_product') }}</label>
                <input class="form-control {{ $errors->has('id_request_product') ? 'is-invalid' : '' }}" type="text" name="id_request_product" id="id_request_product" value="{{ old('id_request_product', $requestStockProduct->id_request_product) }}" required>
                @if($errors->has('id_request_product'))
                    <span class="text-danger">{{ $errors->first('id_request_product') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.requestStockProduct.fields.id_request_product_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="inquiry_id">{{ trans('cruds.requestStockProduct.fields.inquiry') }}</label>
                <select class="form-control select2 {{ $errors->has('inquiry') ? 'is-invalid' : '' }}" name="inquiry_id" id="inquiry_id" required>
                    @foreach($inquiries as $id => $entry)
                        <option value="{{ $id }}" {{ (old('inquiry_id') ? old('inquiry_id') : $requestStockProduct->inquiry->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('inquiry'))
                    <span class="text-danger">{{ $errors->first('inquiry') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.requestStockProduct.fields.inquiry_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tanggal_request">{{ trans('cruds.requestStockProduct.fields.tanggal_request') }}</label>
                <input class="form-control date {{ $errors->has('tanggal_request') ? 'is-invalid' : '' }}" type="text" name="tanggal_request" id="tanggal_request" value="{{ old('tanggal_request', $requestStockProduct->tanggal_request) }}" required>
                @if($errors->has('tanggal_request'))
                    <span class="text-danger">{{ $errors->first('tanggal_request') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.requestStockProduct.fields.tanggal_request_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="request_product_id">{{ trans('cruds.requestStockProduct.fields.request_product') }}</label>
                <select class="form-control select2 {{ $errors->has('request_product') ? 'is-invalid' : '' }}" name="request_product_id" id="request_product_id" required>
                    @foreach($request_products as $id => $entry)
                        <option value="{{ $id }}" {{ (old('request_product_id') ? old('request_product_id') : $requestStockProduct->request_product->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('request_product'))
                    <span class="text-danger">{{ $errors->first('request_product') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.requestStockProduct.fields.request_product_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qty">{{ trans('cruds.requestStockProduct.fields.qty') }}</label>
                <input class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}" type="number" name="qty" id="qty" value="{{ old('qty', $requestStockProduct->qty) }}" step="1">
                @if($errors->has('qty'))
                    <span class="text-danger">{{ $errors->first('qty') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.requestStockProduct.fields.qty_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.requestStockProduct.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\RequestStockProduct::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $requestStockProduct->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.requestStockProduct.fields.status_helper') }}</span>
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