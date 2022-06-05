@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.requestStockProduct.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.request-stock-products.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tanggal_request">{{ trans('cruds.requestStockProduct.fields.tanggal_request') }}</label>
                <input class="form-control date {{ $errors->has('tanggal_request') ? 'is-invalid' : '' }}" type="text" name="tanggal_request" id="tanggal_request" value="{{ old('tanggal_request') }}">
                @if($errors->has('tanggal_request'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal_request') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requestStockProduct.fields.tanggal_request_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="inquiry_id">{{ trans('cruds.requestStockProduct.fields.inquiry') }}</label>
                <select class="form-control select2 {{ $errors->has('inquiry') ? 'is-invalid' : '' }}" name="inquiry_id" id="inquiry_id">
                    @foreach($inquiries as $id => $entry)
                        <option value="{{ $id }}" {{ old('inquiry_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('inquiry'))
                    <div class="invalid-feedback">
                        {{ $errors->first('inquiry') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requestStockProduct.fields.inquiry_helper') }}</span>
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