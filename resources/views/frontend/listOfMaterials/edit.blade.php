@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.listOfMaterial.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.list-of-materials.update", [$listOfMaterial->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="id_list_of_material">{{ trans('cruds.listOfMaterial.fields.id_list_of_material') }}</label>
                            <input class="form-control" type="text" name="id_list_of_material" id="id_list_of_material" value="{{ old('id_list_of_material', $listOfMaterial->id_list_of_material) }}" required>
                            @if($errors->has('id_list_of_material'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('id_list_of_material') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.listOfMaterial.fields.id_list_of_material_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="id_production_plan_id">{{ trans('cruds.listOfMaterial.fields.id_production_plan') }}</label>
                            <select class="form-control select2" name="id_production_plan_id" id="id_production_plan_id" required>
                                @foreach($id_production_plans as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('id_production_plan_id') ? old('id_production_plan_id') : $listOfMaterial->id_production_plan->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('id_production_plan'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('id_production_plan') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.listOfMaterial.fields.id_production_plan_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="request_air">{{ trans('cruds.listOfMaterial.fields.request_air') }}</label>
                            <input class="form-control" type="number" name="request_air" id="request_air" value="{{ old('request_air', $listOfMaterial->request_air) }}" step="1">
                            @if($errors->has('request_air'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('request_air') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.listOfMaterial.fields.request_air_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="request_sukrosa">{{ trans('cruds.listOfMaterial.fields.request_sukrosa') }}</label>
                            <input class="form-control" type="number" name="request_sukrosa" id="request_sukrosa" value="{{ old('request_sukrosa', $listOfMaterial->request_sukrosa) }}" step="1">
                            @if($errors->has('request_sukrosa'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('request_sukrosa') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.listOfMaterial.fields.request_sukrosa_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="request_dektrose">{{ trans('cruds.listOfMaterial.fields.request_dektrose') }}</label>
                            <input class="form-control" type="number" name="request_dektrose" id="request_dektrose" value="{{ old('request_dektrose', $listOfMaterial->request_dektrose) }}" step="1">
                            @if($errors->has('request_dektrose'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('request_dektrose') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.listOfMaterial.fields.request_dektrose_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="request_perisa_yakult">{{ trans('cruds.listOfMaterial.fields.request_perisa_yakult') }}</label>
                            <input class="form-control" type="number" name="request_perisa_yakult" id="request_perisa_yakult" value="{{ old('request_perisa_yakult', $listOfMaterial->request_perisa_yakult) }}" step="1">
                            @if($errors->has('request_perisa_yakult'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('request_perisa_yakult') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.listOfMaterial.fields.request_perisa_yakult_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="request_susu_bubuk_krim">{{ trans('cruds.listOfMaterial.fields.request_susu_bubuk_krim') }}</label>
                            <input class="form-control" type="number" name="request_susu_bubuk_krim" id="request_susu_bubuk_krim" value="{{ old('request_susu_bubuk_krim', $listOfMaterial->request_susu_bubuk_krim) }}" step="1">
                            @if($errors->has('request_susu_bubuk_krim'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('request_susu_bubuk_krim') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.listOfMaterial.fields.request_susu_bubuk_krim_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="request_polietilena_tereftalat">{{ trans('cruds.listOfMaterial.fields.request_polietilena_tereftalat') }}</label>
                            <input class="form-control" type="number" name="request_polietilena_tereftalat" id="request_polietilena_tereftalat" value="{{ old('request_polietilena_tereftalat', $listOfMaterial->request_polietilena_tereftalat) }}" step="1">
                            @if($errors->has('request_polietilena_tereftalat'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('request_polietilena_tereftalat') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.listOfMaterial.fields.request_polietilena_tereftalat_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.listOfMaterial.fields.status') }}</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ListOfMaterial::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', $listOfMaterial->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.listOfMaterial.fields.status_helper') }}</span>
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