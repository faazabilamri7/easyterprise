@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.customerComplain.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.customer-complains.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="sales_order_id">{{ trans('cruds.customerComplain.fields.sales_order') }}</label>
                <select class="form-control select2 {{ $errors->has('sales_order') ? 'is-invalid' : '' }}" name="sales_order_id" id="sales_order_id">
                    @foreach($sales_orders as $id => $entry)
                        <option value="{{ $id }}" {{ old('sales_order_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                <textarea class="form-control {{ $errors->has('keluhan') ? 'is-invalid' : '' }}" name="keluhan" id="keluhan">{{ old('keluhan') }}</textarea>
                @if($errors->has('keluhan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('keluhan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerComplain.fields.keluhan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kritik">{{ trans('cruds.customerComplain.fields.kritik') }}</label>
                <textarea class="form-control {{ $errors->has('kritik') ? 'is-invalid' : '' }}" name="kritik" id="kritik">{{ old('kritik') }}</textarea>
                @if($errors->has('kritik'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kritik') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerComplain.fields.kritik_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="saran">{{ trans('cruds.customerComplain.fields.saran') }}</label>
                <textarea class="form-control {{ $errors->has('saran') ? 'is-invalid' : '' }}" name="saran" id="saran">{{ old('saran') }}</textarea>
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



@endsection