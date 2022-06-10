@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.customerComplain.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.customer-complains.update", [$customerComplain->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="sales_order_id">{{ trans('cruds.customerComplain.fields.sales_order') }}</label>
                            <select class="form-control select2" name="sales_order_id" id="sales_order_id">
                                @foreach($sales_orders as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('sales_order_id') ? old('sales_order_id') : $customerComplain->sales_order->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('sales_order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sales_order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.customerComplain.fields.sales_order_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="keluhan">{{ trans('cruds.customerComplain.fields.keluhan') }}</label>
                            <textarea class="form-control" name="keluhan" id="keluhan">{{ old('keluhan', $customerComplain->keluhan) }}</textarea>
                            @if($errors->has('keluhan'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('keluhan') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.customerComplain.fields.keluhan_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="kritik">{{ trans('cruds.customerComplain.fields.kritik') }}</label>
                            <textarea class="form-control" name="kritik" id="kritik">{{ old('kritik', $customerComplain->kritik) }}</textarea>
                            @if($errors->has('kritik'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('kritik') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.customerComplain.fields.kritik_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="saran">{{ trans('cruds.customerComplain.fields.saran') }}</label>
                            <textarea class="form-control" name="saran" id="saran">{{ old('saran', $customerComplain->saran) }}</textarea>
                            @if($errors->has('saran'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('saran') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.customerComplain.fields.saran_helper') }}</span>
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