@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.salesInvoice.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sales-invoices.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="id_invoice">{{ trans('cruds.salesInvoice.fields.id_invoice') }}</label>
                <input class="form-control {{ $errors->has('id_invoice') ? 'is-invalid' : '' }}" type="number" name="id_invoice" id="id_invoice" value="{{ old('id_invoice', '') }}" step="1" required>
                @if($errors->has('id_invoice'))
                    <span class="text-danger">{{ $errors->first('id_invoice') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salesInvoice.fields.id_invoice_helper') }}</span>
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