@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.pengiriman.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pengirimen.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="id_shipment">{{ trans('cruds.pengiriman.fields.id_shipment') }}</label>
                <input class="form-control {{ $errors->has('id_shipment') ? 'is-invalid' : '' }}" type="text" name="id_shipment" id="id_shipment" value="{{ old('id_shipment', '') }}" required>
                @if($errors->has('id_shipment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_shipment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengiriman.fields.id_shipment_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="no_sales_order_id">{{ trans('cruds.pengiriman.fields.no_sales_order') }}</label>
                <select class="form-control select2 {{ $errors->has('no_sales_order') ? 'is-invalid' : '' }}" name="no_sales_order_id" id="no_sales_order_id" required>
                    @foreach($no_sales_orders as $id => $entry)
                        <option value="{{ $id }}" {{ old('no_sales_order_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('no_sales_order'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_sales_order') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengiriman.fields.no_sales_order_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.pengiriman.fields.status_shipment') }}</label>
                <select class="form-control {{ $errors->has('status_shipment') ? 'is-invalid' : '' }}" name="status_shipment" id="status_shipment">
                    <option value disabled {{ old('status_shipment', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Pengiriman::STATUS_SHIPMENT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status_shipment', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status_shipment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status_shipment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pengiriman.fields.status_shipment_helper') }}</span>
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