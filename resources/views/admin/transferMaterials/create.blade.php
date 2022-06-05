@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.transferMaterial.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.transfer-materials.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tanggal_transaksi">{{ trans('cruds.transferMaterial.fields.tanggal_transaksi') }}</label>
                <input class="form-control date {{ $errors->has('tanggal_transaksi') ? 'is-invalid' : '' }}" type="text" name="tanggal_transaksi" id="tanggal_transaksi" value="{{ old('tanggal_transaksi') }}">
                @if($errors->has('tanggal_transaksi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal_transaksi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transferMaterial.fields.tanggal_transaksi_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.transferMaterial.fields.transfer_dari') }}</label>
                <select class="form-control {{ $errors->has('transfer_dari') ? 'is-invalid' : '' }}" name="transfer_dari" id="transfer_dari">
                    <option value disabled {{ old('transfer_dari', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TransferMaterial::TRANSFER_DARI_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('transfer_dari', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('transfer_dari'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transfer_dari') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transferMaterial.fields.transfer_dari_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.transferMaterial.fields.transfer_ke') }}</label>
                <select class="form-control {{ $errors->has('transfer_ke') ? 'is-invalid' : '' }}" name="transfer_ke" id="transfer_ke">
                    <option value disabled {{ old('transfer_ke', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\TransferMaterial::TRANSFER_KE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('transfer_ke', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('transfer_ke'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transfer_ke') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transferMaterial.fields.transfer_ke_helper') }}</span>
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