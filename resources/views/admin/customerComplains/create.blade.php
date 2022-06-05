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
                <label for="id_customer_id">{{ trans('cruds.customerComplain.fields.id_customer') }}</label>
                <select class="form-control select2 {{ $errors->has('id_customer') ? 'is-invalid' : '' }}" name="id_customer_id" id="id_customer_id">
                    @foreach($id_customers as $id => $entry)
                        <option value="{{ $id }}" {{ old('id_customer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_customer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_customer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerComplain.fields.id_customer_helper') }}</span>
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