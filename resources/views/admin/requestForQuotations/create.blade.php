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
                <label class="required" for="id_request_for_quotation">{{ trans('cruds.requestForQuotation.fields.id_request_for_quotation') }}</label>
                <input class="form-control {{ $errors->has('id_request_for_quotation') ? 'is-invalid' : '' }}" type="text" name="id_request_for_quotation" id="id_request_for_quotation" value="{{ old('id_request_for_quotation', '') }}" required>
                @if($errors->has('id_request_for_quotation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_request_for_quotation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requestForQuotation.fields.id_request_for_quotation_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="id_purchase_requisition_id">{{ trans('cruds.requestForQuotation.fields.id_purchase_requisition') }}</label>
                <select class="form-control select2 {{ $errors->has('id_purchase_requisition') ? 'is-invalid' : '' }}" name="id_purchase_requisition_id" id="id_purchase_requisition_id" required>
                    @foreach($id_purchase_requisitions as $id => $entry)
                        <option value="{{ $id }}" {{ old('id_purchase_requisition_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_purchase_requisition'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_purchase_requisition') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requestForQuotation.fields.id_purchase_requisition_helper') }}</span>
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
                <label for="qty">{{ trans('cruds.requestForQuotation.fields.qty') }}</label>
                <input class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}" type="number" name="qty" id="qty" value="{{ old('qty', '') }}" step="1">
                @if($errors->has('qty'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qty') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requestForQuotation.fields.qty_helper') }}</span>
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
                <label for="description">{{ trans('cruds.requestForQuotation.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.requestForQuotation.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.requestForQuotation.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\RequestForQuotation::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
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