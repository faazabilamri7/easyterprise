@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.salesQuotation.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.sales-quotations.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="id_sales_inquiry_id">{{ trans('cruds.salesQuotation.fields.id_sales_inquiry') }}</label>
                            <select class="form-control select2" name="id_sales_inquiry_id" id="id_sales_inquiry_id" required>
                                @foreach($id_sales_inquiries as $id => $entry)
                                    <option value="{{ $id }}" {{ old('id_sales_inquiry_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('id_sales_inquiry'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('id_sales_inquiry') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesQuotation.fields.id_sales_inquiry_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="id_customer_id">{{ trans('cruds.salesQuotation.fields.id_customer') }}</label>
                            <select class="form-control select2" name="id_customer_id" id="id_customer_id" required>
                                @foreach($id_customers as $id => $entry)
                                    <option value="{{ $id }}" {{ old('id_customer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('id_customer'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('id_customer') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesQuotation.fields.id_customer_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="harga">{{ trans('cruds.salesQuotation.fields.harga') }}</label>
                            <input class="form-control" type="number" name="harga" id="harga" value="{{ old('harga', '') }}" step="0.01">
                            @if($errors->has('harga'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('harga') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesQuotation.fields.harga_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.salesQuotation.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', '') }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesQuotation.fields.status_helper') }}</span>
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