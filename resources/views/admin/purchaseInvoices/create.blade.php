@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.purchaseInvoice.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.purchase-invoices.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="no_purchase_invoice">{{ trans('cruds.purchaseInvoice.fields.no_purchase_invoice') }}</label>
                <input class="form-control {{ $errors->has('no_purchase_invoice') ? 'is-invalid' : '' }}" type="text" name="no_purchase_invoice" id="no_purchase_invoice" value="{{ old('no_purchase_invoice', '') }}">
                @if($errors->has('no_purchase_invoice'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_purchase_invoice') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseInvoice.fields.no_purchase_invoice_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tanggal">{{ trans('cruds.purchaseInvoice.fields.tanggal') }}</label>
                <input class="form-control date {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal') }}">
                @if($errors->has('tanggal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseInvoice.fields.tanggal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="purchase_order_id">{{ trans('cruds.purchaseInvoice.fields.purchase_order') }}</label>
                <select class="form-control select2 {{ $errors->has('purchase_order') ? 'is-invalid' : '' }}" name="purchase_order_id" id="purchase_order_id">
                    @foreach($purchase_orders as $id => $entry)
                        <option value="{{ $id }}" {{ old('purchase_order_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('purchase_order'))
                    <div class="invalid-feedback">
                        {{ $errors->first('purchase_order') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseInvoice.fields.purchase_order_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total">{{ trans('cruds.purchaseInvoice.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', '') }}" step="0.01">
                @if($errors->has('total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseInvoice.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.purchaseInvoice.fields.status') }}</label>
                @foreach(App\Models\PurchaseInvoice::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseInvoice.fields.status_helper') }}</span>
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