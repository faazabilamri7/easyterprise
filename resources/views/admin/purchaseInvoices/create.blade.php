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
                <label for="id_invoice">{{ trans('cruds.purchaseInvoice.fields.id_invoice') }}</label>
                <input class="form-control {{ $errors->has('id_invoice') ? 'is-invalid' : '' }}" type="number" name="id_invoice" id="id_invoice" value="{{ old('id_invoice', '') }}" step="1">
                @if($errors->has('id_invoice'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_invoice') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseInvoice.fields.id_invoice_helper') }}</span>
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