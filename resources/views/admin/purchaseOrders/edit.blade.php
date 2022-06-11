@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.purchaseOrder.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.purchase-orders.update", [$purchaseOrder->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="id_purchase_order">{{ trans('cruds.purchaseOrder.fields.id_purchase_order') }}</label>
                <input class="form-control {{ $errors->has('id_purchase_order') ? 'is-invalid' : '' }}" type="text" name="id_purchase_order" id="id_purchase_order" value="{{ old('id_purchase_order', $purchaseOrder->id_purchase_order) }}" required>
                @if($errors->has('id_purchase_order'))
                    <span class="text-danger">{{ $errors->first('id_purchase_order') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.id_purchase_order_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="id_purchase_quotation_id">{{ trans('cruds.purchaseOrder.fields.id_purchase_quotation') }}</label>
                <select class="form-control select2 {{ $errors->has('id_purchase_quotation') ? 'is-invalid' : '' }}" name="id_purchase_quotation_id" id="id_purchase_quotation_id" required>
                    @foreach($id_purchase_quotations as $id => $entry)
                        <option value="{{ $id }}" {{ (old('id_purchase_quotation_id') ? old('id_purchase_quotation_id') : $purchaseOrder->id_purchase_quotation->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_purchase_quotation'))
                    <span class="text-danger">{{ $errors->first('id_purchase_quotation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.id_purchase_quotation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_purchase_order">{{ trans('cruds.purchaseOrder.fields.date_purchase_order') }}</label>
                <input class="form-control date {{ $errors->has('date_purchase_order') ? 'is-invalid' : '' }}" type="text" name="date_purchase_order" id="date_purchase_order" value="{{ old('date_purchase_order', $purchaseOrder->date_purchase_order) }}">
                @if($errors->has('date_purchase_order'))
                    <span class="text-danger">{{ $errors->first('date_purchase_order') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.date_purchase_order_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="material_name">{{ trans('cruds.purchaseOrder.fields.material_name') }}</label>
                <input class="form-control {{ $errors->has('material_name') ? 'is-invalid' : '' }}" type="text" name="material_name" id="material_name" value="{{ old('material_name', $purchaseOrder->material_name) }}">
                @if($errors->has('material_name'))
                    <span class="text-danger">{{ $errors->first('material_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.material_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quantity">{{ trans('cruds.purchaseOrder.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', $purchaseOrder->quantity) }}" step="1">
                @if($errors->has('quantity'))
                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.quantity_helper') }}</span>
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