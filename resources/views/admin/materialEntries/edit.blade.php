@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.materialEntry.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.material-entries.update", [$materialEntry->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="id_material_entry">{{ trans('cruds.materialEntry.fields.id_material_entry') }}</label>
                <input class="form-control {{ $errors->has('id_material_entry') ? 'is-invalid' : '' }}" type="text" name="id_material_entry" id="id_material_entry" value="{{ old('id_material_entry', $materialEntry->id_material_entry) }}" required>
                @if($errors->has('id_material_entry'))
                    <span class="text-danger">{{ $errors->first('id_material_entry') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.materialEntry.fields.id_material_entry_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="id_purchase_order_id">{{ trans('cruds.materialEntry.fields.id_purchase_order') }}</label>
                <select class="form-control select2 {{ $errors->has('id_purchase_order') ? 'is-invalid' : '' }}" name="id_purchase_order_id" id="id_purchase_order_id" required>
                    @foreach($id_purchase_orders as $id => $entry)
                        <option value="{{ $id }}" {{ (old('id_purchase_order_id') ? old('id_purchase_order_id') : $materialEntry->id_purchase_order->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_purchase_order'))
                    <span class="text-danger">{{ $errors->first('id_purchase_order') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.materialEntry.fields.id_purchase_order_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_material_entry">{{ trans('cruds.materialEntry.fields.date_material_entry') }}</label>
                <input class="form-control date {{ $errors->has('date_material_entry') ? 'is-invalid' : '' }}" type="text" name="date_material_entry" id="date_material_entry" value="{{ old('date_material_entry', $materialEntry->date_material_entry) }}">
                @if($errors->has('date_material_entry'))
                    <span class="text-danger">{{ $errors->first('date_material_entry') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.materialEntry.fields.date_material_entry_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="material_name">{{ trans('cruds.materialEntry.fields.material_name') }}</label>
                <input class="form-control {{ $errors->has('material_name') ? 'is-invalid' : '' }}" type="text" name="material_name" id="material_name" value="{{ old('material_name', $materialEntry->material_name) }}">
                @if($errors->has('material_name'))
                    <span class="text-danger">{{ $errors->first('material_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.materialEntry.fields.material_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qty">{{ trans('cruds.materialEntry.fields.qty') }}</label>
                <input class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}" type="number" name="qty" id="qty" value="{{ old('qty', $materialEntry->qty) }}" step="1">
                @if($errors->has('qty'))
                    <span class="text-danger">{{ $errors->first('qty') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.materialEntry.fields.qty_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.materialEntry.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\MaterialEntry::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $materialEntry->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.materialEntry.fields.status_helper') }}</span>
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