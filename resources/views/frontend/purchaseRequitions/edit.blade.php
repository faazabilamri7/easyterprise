@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.purchaseRequition.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.purchase-requitions.update", [$purchaseRequition->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="id_purchase_requition">{{ trans('cruds.purchaseRequition.fields.id_purchase_requition') }}</label>
                            <input class="form-control" type="text" name="id_purchase_requition" id="id_purchase_requition" value="{{ old('id_purchase_requition', $purchaseRequition->id_purchase_requition) }}" required>
                            @if($errors->has('id_purchase_requition'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('id_purchase_requition') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchaseRequition.fields.id_purchase_requition_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="id_list_of_material_id">{{ trans('cruds.purchaseRequition.fields.id_list_of_material') }}</label>
                            <select class="form-control select2" name="id_list_of_material_id" id="id_list_of_material_id" required>
                                @foreach($id_list_of_materials as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('id_list_of_material_id') ? old('id_list_of_material_id') : $purchaseRequition->id_list_of_material->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\PurchaseRequition::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', $purchaseRequition->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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
                            <select class="form-control select2" name="material_1_id" id="material_1_id">
                                @foreach($material_1s as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('material_1_id') ? old('material_1_id') : $purchaseRequition->material_1->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <input class="form-control" type="number" name="qty_1" id="qty_1" value="{{ old('qty_1', $purchaseRequition->qty_1) }}" step="1">
                            @if($errors->has('qty_1'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('qty_1') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchaseRequition.fields.qty_1_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="material_2_id">{{ trans('cruds.purchaseRequition.fields.material_2') }}</label>
                            <select class="form-control select2" name="material_2_id" id="material_2_id">
                                @foreach($material_2s as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('material_2_id') ? old('material_2_id') : $purchaseRequition->material_2->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <input class="form-control" type="number" name="qty_2" id="qty_2" value="{{ old('qty_2', $purchaseRequition->qty_2) }}" step="1">
                            @if($errors->has('qty_2'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('qty_2') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchaseRequition.fields.qty_2_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="material_3_id">{{ trans('cruds.purchaseRequition.fields.material_3') }}</label>
                            <select class="form-control select2" name="material_3_id" id="material_3_id">
                                @foreach($material_3s as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('material_3_id') ? old('material_3_id') : $purchaseRequition->material_3->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <input class="form-control" type="number" name="qty_3" id="qty_3" value="{{ old('qty_3', $purchaseRequition->qty_3) }}" step="1">
                            @if($errors->has('qty_3'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('qty_3') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchaseRequition.fields.qty_3_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="material_4_id">{{ trans('cruds.purchaseRequition.fields.material_4') }}</label>
                            <select class="form-control select2" name="material_4_id" id="material_4_id">
                                @foreach($material_4s as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('material_4_id') ? old('material_4_id') : $purchaseRequition->material_4->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <input class="form-control" type="number" name="qty_4" id="qty_4" value="{{ old('qty_4', $purchaseRequition->qty_4) }}" step="1">
                            @if($errors->has('qty_4'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('qty_4') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchaseRequition.fields.qty_4_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="material_5_id">{{ trans('cruds.purchaseRequition.fields.material_5') }}</label>
                            <select class="form-control select2" name="material_5_id" id="material_5_id">
                                @foreach($material_5s as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('material_5_id') ? old('material_5_id') : $purchaseRequition->material_5->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <input class="form-control" type="number" name="qty_5" id="qty_5" value="{{ old('qty_5', $purchaseRequition->qty_5) }}" step="1">
                            @if($errors->has('qty_5'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('qty_5') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.purchaseRequition.fields.qty_5_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="material_6_id">{{ trans('cruds.purchaseRequition.fields.material_6') }}</label>
                            <select class="form-control select2" name="material_6_id" id="material_6_id">
                                @foreach($material_6s as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('material_6_id') ? old('material_6_id') : $purchaseRequition->material_6->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <input class="form-control" type="number" name="qty_6" id="qty_6" value="{{ old('qty_6', $purchaseRequition->qty_6) }}" step="1">
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

        </div>
    </div>
</div>
@endsection