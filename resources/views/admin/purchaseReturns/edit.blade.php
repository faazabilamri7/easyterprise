@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.purchaseReturn.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.purchase-returns.update", [$purchaseReturn->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="id_purchase_return">{{ trans('cruds.purchaseReturn.fields.id_purchase_return') }}</label>
                <input class="form-control {{ $errors->has('id_purchase_return') ? 'is-invalid' : '' }}" type="text" name="id_purchase_return" id="id_purchase_return" value="{{ old('id_purchase_return', $purchaseReturn->id_purchase_return) }}">
                @if($errors->has('id_purchase_return'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_purchase_return') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseReturn.fields.id_purchase_return_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="id_purchase_order_id">{{ trans('cruds.purchaseReturn.fields.id_purchase_order') }}</label>
                <select class="form-control select2 {{ $errors->has('id_purchase_order') ? 'is-invalid' : '' }}" name="id_purchase_order_id" id="id_purchase_order_id" required>
                    @foreach($id_purchase_orders as $id => $entry)
                        <option value="{{ $id }}" {{ (old('id_purchase_order_id') ? old('id_purchase_order_id') : $purchaseReturn->id_purchase_order->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_purchase_order'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_purchase_order') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseReturn.fields.id_purchase_order_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_purchase_return">{{ trans('cruds.purchaseReturn.fields.date_purchase_return') }}</label>
                <input class="form-control date {{ $errors->has('date_purchase_return') ? 'is-invalid' : '' }}" type="text" name="date_purchase_return" id="date_purchase_return" value="{{ old('date_purchase_return', $purchaseReturn->date_purchase_return) }}">
                @if($errors->has('date_purchase_return'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_purchase_return') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseReturn.fields.date_purchase_return_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="material_name">{{ trans('cruds.purchaseReturn.fields.material_name') }}</label>
                <input class="form-control {{ $errors->has('material_name') ? 'is-invalid' : '' }}" type="text" name="material_name" id="material_name" value="{{ old('material_name', $purchaseReturn->material_name) }}">
                @if($errors->has('material_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('material_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseReturn.fields.material_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qty">{{ trans('cruds.purchaseReturn.fields.qty') }}</label>
                <input class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}" type="number" name="qty" id="qty" value="{{ old('qty', $purchaseReturn->qty) }}" step="1">
                @if($errors->has('qty'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qty') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseReturn.fields.qty_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.purchaseReturn.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $purchaseReturn->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseReturn.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.purchaseReturn.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PurchaseReturn::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $purchaseReturn->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseReturn.fields.status_helper') }}</span>
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