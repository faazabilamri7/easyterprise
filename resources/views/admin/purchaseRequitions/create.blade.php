@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.purchaseRequition.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.purchase-requitions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="id_purchase_requition">{{ trans('cruds.purchaseRequition.fields.id_purchase_requition') }}</label>
                <input class="form-control {{ $errors->has('id_purchase_requition') ? 'is-invalid' : '' }}" type="text" name="id_purchase_requition" id="id_purchase_requition" value="{{ old('id_purchase_requition', '') }}" required>
                @if($errors->has('id_purchase_requition'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_purchase_requition') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseRequition.fields.id_purchase_requition_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="id_list_of_material_id">{{ trans('cruds.purchaseRequition.fields.id_list_of_material') }}</label>
                <select class="form-control select2 {{ $errors->has('id_list_of_material') ? 'is-invalid' : '' }}" name="id_list_of_material_id" id="id_list_of_material_id" required>
                    @foreach($id_list_of_materials as $id => $entry)
                        <option value="{{ $id }}" {{ old('id_list_of_material_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_list_of_material'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_list_of_material') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseRequition.fields.id_list_of_material_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.purchaseRequition.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PurchaseRequition::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseRequition.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="material_1_id">{{ trans('cruds.purchaseRequition.fields.material_1') }}</label>
                <select class="form-control select2 {{ $errors->has('material_1') ? 'is-invalid' : '' }}" name="material_1_id" id="material_1_id">
                    @foreach($material_1s as $id => $entry)
                        <option value="{{ $id }}" {{ old('material_1_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('material_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('material_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseRequition.fields.material_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qty_1">{{ trans('cruds.purchaseRequition.fields.qty_1') }}</label>
                <input class="form-control {{ $errors->has('qty_1') ? 'is-invalid' : '' }}" type="number" name="qty_1" id="qty_1" value="{{ old('qty_1', '') }}" step="1">
                @if($errors->has('qty_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qty_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseRequition.fields.qty_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="material_2_id">{{ trans('cruds.purchaseRequition.fields.material_2') }}</label>
                <select class="form-control select2 {{ $errors->has('material_2') ? 'is-invalid' : '' }}" name="material_2_id" id="material_2_id">
                    @foreach($material_2s as $id => $entry)
                        <option value="{{ $id }}" {{ old('material_2_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('material_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('material_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseRequition.fields.material_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qty_2">{{ trans('cruds.purchaseRequition.fields.qty_2') }}</label>
                <input class="form-control {{ $errors->has('qty_2') ? 'is-invalid' : '' }}" type="number" name="qty_2" id="qty_2" value="{{ old('qty_2', '') }}" step="1">
                @if($errors->has('qty_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qty_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseRequition.fields.qty_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="material_3_id">{{ trans('cruds.purchaseRequition.fields.material_3') }}</label>
                <select class="form-control select2 {{ $errors->has('material_3') ? 'is-invalid' : '' }}" name="material_3_id" id="material_3_id">
                    @foreach($material_3s as $id => $entry)
                        <option value="{{ $id }}" {{ old('material_3_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('material_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('material_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseRequition.fields.material_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qty_3">{{ trans('cruds.purchaseRequition.fields.qty_3') }}</label>
                <input class="form-control {{ $errors->has('qty_3') ? 'is-invalid' : '' }}" type="number" name="qty_3" id="qty_3" value="{{ old('qty_3', '') }}" step="1">
                @if($errors->has('qty_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qty_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseRequition.fields.qty_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="material_4_id">{{ trans('cruds.purchaseRequition.fields.material_4') }}</label>
                <select class="form-control select2 {{ $errors->has('material_4') ? 'is-invalid' : '' }}" name="material_4_id" id="material_4_id">
                    @foreach($material_4s as $id => $entry)
                        <option value="{{ $id }}" {{ old('material_4_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('material_4'))
                    <div class="invalid-feedback">
                        {{ $errors->first('material_4') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseRequition.fields.material_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qty_4">{{ trans('cruds.purchaseRequition.fields.qty_4') }}</label>
                <input class="form-control {{ $errors->has('qty_4') ? 'is-invalid' : '' }}" type="number" name="qty_4" id="qty_4" value="{{ old('qty_4', '') }}" step="1">
                @if($errors->has('qty_4'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qty_4') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseRequition.fields.qty_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="material_5_id">{{ trans('cruds.purchaseRequition.fields.material_5') }}</label>
                <select class="form-control select2 {{ $errors->has('material_5') ? 'is-invalid' : '' }}" name="material_5_id" id="material_5_id">
                    @foreach($material_5s as $id => $entry)
                        <option value="{{ $id }}" {{ old('material_5_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('material_5'))
                    <div class="invalid-feedback">
                        {{ $errors->first('material_5') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseRequition.fields.material_5_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qty_5">{{ trans('cruds.purchaseRequition.fields.qty_5') }}</label>
                <input class="form-control {{ $errors->has('qty_5') ? 'is-invalid' : '' }}" type="number" name="qty_5" id="qty_5" value="{{ old('qty_5', '') }}" step="1">
                @if($errors->has('qty_5'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qty_5') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseRequition.fields.qty_5_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="material_6_id">{{ trans('cruds.purchaseRequition.fields.material_6') }}</label>
                <select class="form-control select2 {{ $errors->has('material_6') ? 'is-invalid' : '' }}" name="material_6_id" id="material_6_id">
                    @foreach($material_6s as $id => $entry)
                        <option value="{{ $id }}" {{ old('material_6_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('material_6'))
                    <div class="invalid-feedback">
                        {{ $errors->first('material_6') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseRequition.fields.material_6_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qty_6">{{ trans('cruds.purchaseRequition.fields.qty_6') }}</label>
                <input class="form-control {{ $errors->has('qty_6') ? 'is-invalid' : '' }}" type="number" name="qty_6" id="qty_6" value="{{ old('qty_6', '') }}" step="1">
                @if($errors->has('qty_6'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qty_6') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseRequition.fields.qty_6_helper') }}</span>
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