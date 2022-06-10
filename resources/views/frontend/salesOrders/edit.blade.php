@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.salesOrder.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.sales-orders.update", [$salesOrder->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="no_sales_order">{{ trans('cruds.salesOrder.fields.no_sales_order') }}</label>
                            <input class="form-control" type="text" name="no_sales_order" id="no_sales_order" value="{{ old('no_sales_order', $salesOrder->no_sales_order) }}">
                            @if($errors->has('no_sales_order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('no_sales_order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesOrder.fields.no_sales_order_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">{{ trans('cruds.salesOrder.fields.tanggal') }}</label>
                            <input class="form-control date" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $salesOrder->tanggal) }}">
                            @if($errors->has('tanggal'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tanggal') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesOrder.fields.tanggal_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="sales_quotation_id">{{ trans('cruds.salesOrder.fields.sales_quotation') }}</label>
                            <select class="form-control select2" name="sales_quotation_id" id="sales_quotation_id" required>
                                @foreach($sales_quotations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('sales_quotation_id') ? old('sales_quotation_id') : $salesOrder->sales_quotation->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('sales_quotation'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sales_quotation') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesOrder.fields.sales_quotation_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="detail_order">{{ trans('cruds.salesOrder.fields.detail_order') }}</label>
                            <input class="form-control" type="text" name="detail_order" id="detail_order" value="{{ old('detail_order', $salesOrder->detail_order) }}">
                            @if($errors->has('detail_order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('detail_order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesOrder.fields.detail_order_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.salesOrder.fields.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\SalesOrder::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', $salesOrder->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesOrder.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection