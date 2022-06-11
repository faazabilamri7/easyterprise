@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.pengiriman.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pengirimen.update", [$pengiriman->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="id_pengiriman">{{ trans('cruds.pengiriman.fields.id_pengiriman') }}</label>
                <input class="form-control {{ $errors->has('id_pengiriman') ? 'is-invalid' : '' }}" type="text" name="id_pengiriman" id="id_pengiriman" value="{{ old('id_pengiriman', $pengiriman->id_pengiriman) }}" required>
                @if($errors->has('id_pengiriman'))
                    <span class="text-danger">{{ $errors->first('id_pengiriman') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pengiriman.fields.id_pengiriman_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="no_sales_order_id">{{ trans('cruds.pengiriman.fields.no_sales_order') }}</label>
                <select class="form-control select2 {{ $errors->has('no_sales_order') ? 'is-invalid' : '' }}" name="no_sales_order_id" id="no_sales_order_id" required>
                    @foreach($no_sales_orders as $id => $entry)
                        <option value="{{ $id }}" {{ (old('no_sales_order_id') ? old('no_sales_order_id') : $pengiriman->no_sales_order->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('no_sales_order'))
                    <span class="text-danger">{{ $errors->first('no_sales_order') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pengiriman.fields.no_sales_order_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.pengiriman.fields.status_pengiriman') }}</label>
                <select class="form-control {{ $errors->has('status_pengiriman') ? 'is-invalid' : '' }}" name="status_pengiriman" id="status_pengiriman">
                    <option value disabled {{ old('status_pengiriman', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Pengiriman::STATUS_PENGIRIMAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status_pengiriman', $pengiriman->status_pengiriman) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status_pengiriman'))
                    <span class="text-danger">{{ $errors->first('status_pengiriman') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pengiriman.fields.status_pengiriman_helper') }}</span>
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