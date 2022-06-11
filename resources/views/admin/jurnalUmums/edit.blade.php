@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.jurnalUmum.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.jurnal-umums.update", [$jurnalUmum->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="akun_id">{{ trans('cruds.jurnalUmum.fields.akun') }}</label>
                <select class="form-control select2 {{ $errors->has('akun') ? 'is-invalid' : '' }}" name="akun_id" id="akun_id" required>
                    @foreach($akuns as $id => $entry)
                        <option value="{{ $id }}" {{ (old('akun_id') ? old('akun_id') : $jurnalUmum->akun->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('akun'))
                    <span class="text-danger">{{ $errors->first('akun') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jurnalUmum.fields.akun_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tanggal">{{ trans('cruds.jurnalUmum.fields.tanggal') }}</label>
                <input class="form-control date {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $jurnalUmum->tanggal) }}">
                @if($errors->has('tanggal'))
                    <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jurnalUmum.fields.tanggal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nama">{{ trans('cruds.jurnalUmum.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', $jurnalUmum->nama) }}">
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jurnalUmum.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="debit">{{ trans('cruds.jurnalUmum.fields.debit') }}</label>
                <input class="form-control {{ $errors->has('debit') ? 'is-invalid' : '' }}" type="number" name="debit" id="debit" value="{{ old('debit', $jurnalUmum->debit) }}" step="0.01">
                @if($errors->has('debit'))
                    <span class="text-danger">{{ $errors->first('debit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jurnalUmum.fields.debit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kredit">{{ trans('cruds.jurnalUmum.fields.kredit') }}</label>
                <input class="form-control {{ $errors->has('kredit') ? 'is-invalid' : '' }}" type="number" name="kredit" id="kredit" value="{{ old('kredit', $jurnalUmum->kredit) }}" step="0.01">
                @if($errors->has('kredit'))
                    <span class="text-danger">{{ $errors->first('kredit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jurnalUmum.fields.kredit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_debit">{{ trans('cruds.jurnalUmum.fields.total_debit') }}</label>
                <input class="form-control {{ $errors->has('total_debit') ? 'is-invalid' : '' }}" type="number" name="total_debit" id="total_debit" value="{{ old('total_debit', $jurnalUmum->total_debit) }}" step="0.01">
                @if($errors->has('total_debit'))
                    <span class="text-danger">{{ $errors->first('total_debit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jurnalUmum.fields.total_debit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_kredit">{{ trans('cruds.jurnalUmum.fields.total_kredit') }}</label>
                <input class="form-control {{ $errors->has('total_kredit') ? 'is-invalid' : '' }}" type="text" name="total_kredit" id="total_kredit" value="{{ old('total_kredit', $jurnalUmum->total_kredit) }}">
                @if($errors->has('total_kredit'))
                    <span class="text-danger">{{ $errors->first('total_kredit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jurnalUmum.fields.total_kredit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.jurnalUmum.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $jurnalUmum->status) }}">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jurnalUmum.fields.status_helper') }}</span>
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