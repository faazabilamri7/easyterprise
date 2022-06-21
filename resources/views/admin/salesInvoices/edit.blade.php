@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.salesInvoice.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sales-invoices.update", [$salesInvoice->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="no_sales_invoice">{{ trans('cruds.salesInvoice.fields.no_sales_invoice') }}</label>
                <input class="form-control {{ $errors->has('no_sales_invoice') ? 'is-invalid' : '' }}" type="text" name="no_sales_invoice" id="no_sales_invoice" value="{{ old('no_sales_invoice', $salesInvoice->no_sales_invoice) }}">
                @if($errors->has('no_sales_invoice'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_sales_invoice') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salesInvoice.fields.no_sales_invoice_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sales_order_id">{{ trans('cruds.salesInvoice.fields.sales_order') }}</label>
                <select class="form-control select2 {{ $errors->has('sales_order') ? 'is-invalid' : '' }}" name="sales_order_id" id="sales_order_id">
                    @foreach($sales_orders as $id => $entry)
                        <option value="{{ $id }}" {{ (old('sales_order_id') ? old('sales_order_id') : $salesInvoice->sales_order->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('sales_order'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sales_order') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salesInvoice.fields.sales_order_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="customer_id">{{ trans('cruds.salesInvoice.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id">
                    @foreach($customers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('customer_id') ? old('customer_id') : $salesInvoice->customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salesInvoice.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tanggal">{{ trans('cruds.salesInvoice.fields.tanggal') }}</label>
                <input class="form-control date {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $salesInvoice->tanggal) }}">
                @if($errors->has('tanggal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salesInvoice.fields.tanggal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jatuh_tempo">{{ trans('cruds.salesInvoice.fields.jatuh_tempo') }}</label>
                <input class="form-control date {{ $errors->has('jatuh_tempo') ? 'is-invalid' : '' }}" type="text" name="jatuh_tempo" id="jatuh_tempo" value="{{ old('jatuh_tempo', $salesInvoice->jatuh_tempo) }}">
                @if($errors->has('jatuh_tempo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jatuh_tempo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salesInvoice.fields.jatuh_tempo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total">{{ trans('cruds.salesInvoice.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', $salesInvoice->total) }}" step="0.01">
                @if($errors->has('total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salesInvoice.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.salesInvoice.fields.status') }}</label>
                @foreach(App\Models\SalesInvoice::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', $salesInvoice->status) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salesInvoice.fields.status_helper') }}</span>
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