@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.transferMaterial.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.transfer-materials.update", [$transferMaterial->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="id_transfer_material">{{ trans('cruds.transferMaterial.fields.id_transfer_material') }}</label>
                <input class="form-control {{ $errors->has('id_transfer_material') ? 'is-invalid' : '' }}" type="text" name="id_transfer_material" id="id_transfer_material" value="{{ old('id_transfer_material', $transferMaterial->id_transfer_material) }}" required>
                @if($errors->has('id_transfer_material'))
                    <span class="text-danger">{{ $errors->first('id_transfer_material') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transferMaterial.fields.id_transfer_material_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.transferMaterial.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TransferMaterial::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $transferMaterial->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
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



@endsection