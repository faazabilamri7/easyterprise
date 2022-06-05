@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.salesInquiry.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.sales-inquiries.update", [$salesInquiry->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="id_customer_id">{{ trans('cruds.salesInquiry.fields.id_customer') }}</label>
                            <select class="form-control select2" name="id_customer_id" id="id_customer_id">
                                @foreach($id_customers as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('id_customer_id') ? old('id_customer_id') : $salesInquiry->id_customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('id_customer'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('id_customer') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesInquiry.fields.id_customer_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.salesInquiry.fields.inquiry') }}</label>
                            <select class="form-control" name="inquiry" id="inquiry">
                                <option value disabled {{ old('inquiry', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\SalesInquiry::INQUIRY_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('inquiry', $salesInquiry->inquiry) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('inquiry'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('inquiry') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesInquiry.fields.inquiry_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="tgl_inquiry">{{ trans('cruds.salesInquiry.fields.tgl_inquiry') }}</label>
                            <input class="form-control date" type="text" name="tgl_inquiry" id="tgl_inquiry" value="{{ old('tgl_inquiry', $salesInquiry->tgl_inquiry) }}" required>
                            @if($errors->has('tgl_inquiry'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tgl_inquiry') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesInquiry.fields.tgl_inquiry_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="id_product_id">{{ trans('cruds.salesInquiry.fields.id_product') }}</label>
                            <select class="form-control select2" name="id_product_id" id="id_product_id" required>
                                @foreach($id_products as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('id_product_id') ? old('id_product_id') : $salesInquiry->id_product->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('id_product'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('id_product') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesInquiry.fields.id_product_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="qty">{{ trans('cruds.salesInquiry.fields.qty') }}</label>
                            <input class="form-control" type="number" name="qty" id="qty" value="{{ old('qty', $salesInquiry->qty) }}" step="1">
                            @if($errors->has('qty'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('qty') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesInquiry.fields.qty_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.salesInquiry.fields.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\SalesInquiry::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', $salesInquiry->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesInquiry.fields.status_helper') }}</span>
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