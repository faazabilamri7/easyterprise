@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.requestForQuotation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.request-for-quotations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="id_purchase_requisition">{{ trans('cruds.requestForQuotation.fields.id_purchase_requisition') }}</label>
                <input class="form-control {{ $errors->has('id_purchase_requisition') ? 'is-invalid' : '' }}" type="number" name="id_purchase_requisition" id="id_purchase_requisition" value="{{ old('id_purchase_requisition', '') }}" step="1">
                @if($errors->has('id_purchase_requisition'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_purchase_requisition') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requestForQuotation.fields.id_purchase_requisition_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="id_company">{{ trans('cruds.requestForQuotation.fields.id_company') }}</label>
                <input class="form-control {{ $errors->has('id_company') ? 'is-invalid' : '' }}" type="number" name="id_company" id="id_company" value="{{ old('id_company', '') }}" step="1">
                @if($errors->has('id_company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_company') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requestForQuotation.fields.id_company_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="material_name">{{ trans('cruds.requestForQuotation.fields.material_name') }}</label>
                <input class="form-control {{ $errors->has('material_name') ? 'is-invalid' : '' }}" type="text" name="material_name" id="material_name" value="{{ old('material_name', '') }}">
                @if($errors->has('material_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('material_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requestForQuotation.fields.material_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quantity">{{ trans('cruds.requestForQuotation.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', '') }}" step="1">
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requestForQuotation.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unit_price">{{ trans('cruds.requestForQuotation.fields.unit_price') }}</label>
                <input class="form-control {{ $errors->has('unit_price') ? 'is-invalid' : '' }}" type="number" name="unit_price" id="unit_price" value="{{ old('unit_price', '') }}" step="0.01">
                @if($errors->has('unit_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('unit_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requestForQuotation.fields.unit_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_price">{{ trans('cruds.requestForQuotation.fields.total_price') }}</label>
                <input class="form-control {{ $errors->has('total_price') ? 'is-invalid' : '' }}" type="number" name="total_price" id="total_price" value="{{ old('total_price', '') }}" step="0.01">
                @if($errors->has('total_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requestForQuotation.fields.total_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.requestForQuotation.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', '') }}">
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requestForQuotation.fields.status_helper') }}</span>
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