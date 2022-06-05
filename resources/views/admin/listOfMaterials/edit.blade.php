@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.listOfMaterial.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.list-of-materials.update", [$listOfMaterial->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="production_plan_id">{{ trans('cruds.listOfMaterial.fields.production_plan') }}</label>
                <select class="form-control select2 {{ $errors->has('production_plan') ? 'is-invalid' : '' }}" name="production_plan_id" id="production_plan_id" required>
                    @foreach($production_plans as $id => $entry)
                        <option value="{{ $id }}" {{ (old('production_plan_id') ? old('production_plan_id') : $listOfMaterial->production_plan->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('production_plan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('production_plan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listOfMaterial.fields.production_plan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tanggal_mulai">{{ trans('cruds.listOfMaterial.fields.tanggal_mulai') }}</label>
                <input class="form-control date {{ $errors->has('tanggal_mulai') ? 'is-invalid' : '' }}" type="text" name="tanggal_mulai" id="tanggal_mulai" value="{{ old('tanggal_mulai', $listOfMaterial->tanggal_mulai) }}" required>
                @if($errors->has('tanggal_mulai'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal_mulai') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listOfMaterial.fields.tanggal_mulai_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tanggal_selesai">{{ trans('cruds.listOfMaterial.fields.tanggal_selesai') }}</label>
                <input class="form-control date {{ $errors->has('tanggal_selesai') ? 'is-invalid' : '' }}" type="text" name="tanggal_selesai" id="tanggal_selesai" value="{{ old('tanggal_selesai', $listOfMaterial->tanggal_selesai) }}">
                @if($errors->has('tanggal_selesai'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal_selesai') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listOfMaterial.fields.tanggal_selesai_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pilihan_bahan_baku">{{ trans('cruds.listOfMaterial.fields.pilihan_bahan_baku') }}</label>
                <input class="form-control {{ $errors->has('pilihan_bahan_baku') ? 'is-invalid' : '' }}" type="text" name="pilihan_bahan_baku" id="pilihan_bahan_baku" value="{{ old('pilihan_bahan_baku', $listOfMaterial->pilihan_bahan_baku) }}">
                @if($errors->has('pilihan_bahan_baku'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pilihan_bahan_baku') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listOfMaterial.fields.pilihan_bahan_baku_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="qty">{{ trans('cruds.listOfMaterial.fields.qty') }}</label>
                <input class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}" type="number" name="qty" id="qty" value="{{ old('qty', $listOfMaterial->qty) }}" step="1" required>
                @if($errors->has('qty'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qty') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listOfMaterial.fields.qty_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="harga_satuan">{{ trans('cruds.listOfMaterial.fields.harga_satuan') }}</label>
                <input class="form-control {{ $errors->has('harga_satuan') ? 'is-invalid' : '' }}" type="number" name="harga_satuan" id="harga_satuan" value="{{ old('harga_satuan', $listOfMaterial->harga_satuan) }}" step="1" required>
                @if($errors->has('harga_satuan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('harga_satuan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listOfMaterial.fields.harga_satuan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total">{{ trans('cruds.listOfMaterial.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="text" name="total" id="total" value="{{ old('total', $listOfMaterial->total) }}" required>
                @if($errors->has('total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.listOfMaterial.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.listOfMaterial.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
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



@endsection