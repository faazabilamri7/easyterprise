@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.purchaseInq.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.purchase-inqs.update", [$purchaseInq->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="id_request_for_quotation_id">{{ trans('cruds.purchaseInq.fields.id_request_for_quotation') }}</label>
                <select class="form-control select2 {{ $errors->has('id_request_for_quotation') ? 'is-invalid' : '' }}" name="id_request_for_quotation_id" id="id_request_for_quotation_id">
                    @foreach($id_request_for_quotations as $id => $entry)
                        <option value="{{ $id }}" {{ (old('id_request_for_quotation_id') ? old('id_request_for_quotation_id') : $purchaseInq->id_request_for_quotation->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_request_for_quotation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_request_for_quotation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseInq.fields.id_request_for_quotation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_purchase_inquiry">{{ trans('cruds.purchaseInq.fields.date_purchase_inquiry') }}</label>
                <input class="form-control date {{ $errors->has('date_purchase_inquiry') ? 'is-invalid' : '' }}" type="text" name="date_purchase_inquiry" id="date_purchase_inquiry" value="{{ old('date_purchase_inquiry', $purchaseInq->date_purchase_inquiry) }}">
                @if($errors->has('date_purchase_inquiry'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_purchase_inquiry') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseInq.fields.date_purchase_inquiry_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="material_name">{{ trans('cruds.purchaseInq.fields.material_name') }}</label>
                <input class="form-control {{ $errors->has('material_name') ? 'is-invalid' : '' }}" type="text" name="material_name" id="material_name" value="{{ old('material_name', $purchaseInq->material_name) }}">
                @if($errors->has('material_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('material_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseInq.fields.material_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quantity">{{ trans('cruds.purchaseInq.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', $purchaseInq->quantity) }}" step="1">
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseInq.fields.quantity_helper') }}</span>
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