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
                            <label for="id_sales_quotation">{{ trans('cruds.salesQuotation.fields.id_sales_quotation') }}</label>
                            <input class="form-control" type="text" name="id_sales_quotation" id="id_sales_quotation" value="{{ old('id_sales_quotation', '') }}">
                            @if($errors->has('id_sales_quotation'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('id_sales_quotation') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesQuotation.fields.id_sales_quotation_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="kode_inquiry_id">{{ trans('cruds.salesQuotation.fields.kode_inquiry') }}</label>
                            <select class="form-control select2" name="kode_inquiry_id" id="kode_inquiry_id" required>
                                @foreach($kode_inquiries as $id => $entry)
                                    <option value="{{ $id }}" {{ old('kode_inquiry_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('kode_inquiry'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('kode_inquiry') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesQuotation.fields.kode_inquiry_helper') }}</span>
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
                            <label>{{ trans('cruds.salesQuotation.fields.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\SalesQuotation::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
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