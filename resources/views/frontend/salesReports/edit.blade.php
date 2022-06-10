@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.salesReport.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.sales-reports.update", [$salesReport->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="status_id">{{ trans('cruds.salesReport.fields.status') }}</label>
                            <select class="form-control select2" name="status_id" id="status_id">
                                @foreach($statuses as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('status_id') ? old('status_id') : $salesReport->status->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesReport.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="tgl_sales_order_id">{{ trans('cruds.salesReport.fields.tgl_sales_order') }}</label>
                            <select class="form-control select2" name="tgl_sales_order_id" id="tgl_sales_order_id">
                                @foreach($tgl_sales_orders as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('tgl_sales_order_id') ? old('tgl_sales_order_id') : $salesReport->tgl_sales_order->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('tgl_sales_order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tgl_sales_order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesReport.fields.tgl_sales_order_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="no_sales_order_id">{{ trans('cruds.salesReport.fields.no_sales_order') }}</label>
                            <select class="form-control select2" name="no_sales_order_id" id="no_sales_order_id">
                                @foreach($no_sales_orders as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('no_sales_order_id') ? old('no_sales_order_id') : $salesReport->no_sales_order->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('no_sales_order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('no_sales_order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.salesReport.fields.no_sales_order_helper') }}</span>
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