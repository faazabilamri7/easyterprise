@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.transferMaterial.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.transfer-materials.update", [$transferMaterial->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="id_transfer_material">{{ trans('cruds.transferMaterial.fields.id_transfer_material') }}</label>
                            <input class="form-control" type="text" name="id_transfer_material" id="id_transfer_material" value="{{ old('id_transfer_material', $transferMaterial->id_transfer_material) }}">
                            @if($errors->has('id_transfer_material'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('id_transfer_material') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transferMaterial.fields.id_transfer_material_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.transferMaterial.fields.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\TransferMaterial::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', $transferMaterial->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.transferMaterial.fields.status_helper') }}</span>
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