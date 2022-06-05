@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.purchaseInq.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.purchase-inqs.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="id_request_for_quotation_id">{{ trans('cruds.purchaseInq.fields.id_request_for_quotation') }}</label>
                            <select class="form-control select2" name="id_request_for_quotation_id" id="id_request_for_quotation_id">
                                @foreach($id_request_for_quotations as $id => $entry)
                                    <option value="{{ $id }}" {{ old('id_request_for_quotation_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('id_request_for_quotation'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('id_request_for_quotation') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchaseInq.fields.id_request_for_quotation_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="date_purchase_inquiry">{{ trans('cruds.purchaseInq.fields.date_purchase_inquiry') }}</label>
                            <input class="form-control date" type="text" name="date_purchase_inquiry" id="date_purchase_inquiry" value="{{ old('date_purchase_inquiry') }}">
                            @if($errors->has('date_purchase_inquiry'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date_purchase_inquiry') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchaseInq.fields.date_purchase_inquiry_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="material_name">{{ trans('cruds.purchaseInq.fields.material_name') }}</label>
                            <input class="form-control" type="text" name="material_name" id="material_name" value="{{ old('material_name', '') }}">
                            @if($errors->has('material_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('material_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchaseInq.fields.material_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="quantity">{{ trans('cruds.purchaseInq.fields.quantity') }}</label>
                            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ old('quantity', '') }}" step="1">
                            @if($errors->has('quantity'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('quantity') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchaseInq.fields.quantity_helper') }}</span>
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