@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.purchaseQuotation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.purchase-quotations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="id_purchase_quotation">{{ trans('cruds.purchaseQuotation.fields.id_purchase_quotation') }}</label>
                <input class="form-control {{ $errors->has('id_purchase_quotation') ? 'is-invalid' : '' }}" type="text" name="id_purchase_quotation" id="id_purchase_quotation" value="{{ old('id_purchase_quotation', '') }}" required>
                @if($errors->has('id_purchase_quotation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_purchase_quotation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseQuotation.fields.id_purchase_quotation_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="id_purchase_inquiry_id">{{ trans('cruds.purchaseQuotation.fields.id_purchase_inquiry') }}</label>
                <select class="form-control select2 {{ $errors->has('id_purchase_inquiry') ? 'is-invalid' : '' }}" name="id_purchase_inquiry_id" id="id_purchase_inquiry_id" required>
                    @foreach($id_purchase_inquiries as $id => $entry)
                        <option value="{{ $id }}" {{ old('id_purchase_inquiry_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_purchase_inquiry'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_purchase_inquiry') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseQuotation.fields.id_purchase_inquiry_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="id_vendor_id">{{ trans('cruds.purchaseQuotation.fields.id_vendor') }}</label>
                <select class="form-control select2 {{ $errors->has('id_vendor') ? 'is-invalid' : '' }}" name="id_vendor_id" id="id_vendor_id" required>
                    @foreach($id_vendors as $id => $entry)
                        <option value="{{ $id }}" {{ old('id_vendor_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_vendor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_vendor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseQuotation.fields.id_vendor_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.purchaseQuotation.fields.material_name') }}</label>
                <select class="form-control {{ $errors->has('material_name') ? 'is-invalid' : '' }}" name="material_name" id="material_name">
                    <option value disabled {{ old('material_name', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PurchaseQuotation::MATERIAL_NAME_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('material_name', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('material_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('material_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseQuotation.fields.material_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unit_price">{{ trans('cruds.purchaseQuotation.fields.unit_price') }}</label>
                <input class="form-control {{ $errors->has('unit_price') ? 'is-invalid' : '' }}" type="number" name="unit_price" id="unit_price" value="{{ old('unit_price', '') }}" step="0.01">
                @if($errors->has('unit_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unit_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseQuotation.fields.unit_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_price">{{ trans('cruds.purchaseQuotation.fields.total_price') }}</label>
                <input class="form-control {{ $errors->has('total_price') ? 'is-invalid' : '' }}" type="number" name="total_price" id="total_price" value="{{ old('total_price', '') }}" step="0.01">
                @if($errors->has('total_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseQuotation.fields.total_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.purchaseQuotation.fields.payment_method') }}</label>
                <select class="form-control {{ $errors->has('payment_method') ? 'is-invalid' : '' }}" name="payment_method" id="payment_method">
                    <option value disabled {{ old('payment_method', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PurchaseQuotation::PAYMENT_METHOD_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_method', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_method'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_method') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseQuotation.fields.payment_method_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.purchaseQuotation.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PurchaseQuotation::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseQuotation.fields.status_helper') }}</span>
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