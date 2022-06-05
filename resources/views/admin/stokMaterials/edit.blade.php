@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.stokMaterial.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.stok-materials.update", [$stokMaterial->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nama_material">{{ trans('cruds.stokMaterial.fields.nama_material') }}</label>
                <input class="form-control {{ $errors->has('nama_material') ? 'is-invalid' : '' }}" type="text" name="nama_material" id="nama_material" value="{{ old('nama_material', $stokMaterial->nama_material) }}">
                @if($errors->has('nama_material'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_material') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stokMaterial.fields.nama_material_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qty">{{ trans('cruds.stokMaterial.fields.qty') }}</label>
                <input class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}" type="text" name="qty" id="qty" value="{{ old('qty', $stokMaterial->qty) }}">
                @if($errors->has('qty'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qty') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stokMaterial.fields.qty_helper') }}</span>
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