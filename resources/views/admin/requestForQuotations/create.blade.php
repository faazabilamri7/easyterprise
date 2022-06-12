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