@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.bukuBesar.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.buku-besars.update", [$bukuBesar->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="tanggal">{{ trans('cruds.bukuBesar.fields.tanggal') }}</label>
                <input class="form-control date {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $bukuBesar->tanggal) }}">
                @if($errors->has('tanggal'))
                    <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.bukuBesar.fields.tanggal_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="akun_id">{{ trans('cruds.bukuBesar.fields.akun') }}</label>
                <select class="form-control select2 {{ $errors->has('akun') ? 'is-invalid' : '' }}" name="akun_id" id="akun_id" required>
                    @foreach($akuns as $id => $entry)
                        <option value="{{ $id }}" {{ (old('akun_id') ? old('akun_id') : $bukuBesar->akun->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('akun'))
                    <span class="text-danger">{{ $errors->first('akun') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.bukuBesar.fields.akun_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keterangan">{{ trans('cruds.bukuBesar.fields.keterangan') }}</label>
                <input class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" type="text" name="keterangan" id="keterangan" value="{{ old('keterangan', $bukuBesar->keterangan) }}">
                @if($errors->has('keterangan'))
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.bukuBesar.fields.keterangan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="debit">{{ trans('cruds.bukuBesar.fields.debit') }}</label>
                <input class="form-control {{ $errors->has('debit') ? 'is-invalid' : '' }}" type="number" name="debit" id="debit" value="{{ old('debit', $bukuBesar->debit) }}" step="0.01">
                @if($errors->has('debit'))
                    <span class="text-danger">{{ $errors->first('debit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.bukuBesar.fields.debit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kredit">{{ trans('cruds.bukuBesar.fields.kredit') }}</label>
                <input class="form-control {{ $errors->has('kredit') ? 'is-invalid' : '' }}" type="number" name="kredit" id="kredit" value="{{ old('kredit', $bukuBesar->kredit) }}" step="0.01">
                @if($errors->has('kredit'))
                    <span class="text-danger">{{ $errors->first('kredit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.bukuBesar.fields.kredit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_debit">{{ trans('cruds.bukuBesar.fields.total_debit') }}</label>
                <input class="form-control {{ $errors->has('total_debit') ? 'is-invalid' : '' }}" type="number" name="total_debit" id="total_debit" value="{{ old('total_debit', $bukuBesar->total_debit) }}" step="0.01">
                @if($errors->has('total_debit'))
                    <span class="text-danger">{{ $errors->first('total_debit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.bukuBesar.fields.total_debit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_kredit">{{ trans('cruds.bukuBesar.fields.total_kredit') }}</label>
                <input class="form-control {{ $errors->has('total_kredit') ? 'is-invalid' : '' }}" type="number" name="total_kredit" id="total_kredit" value="{{ old('total_kredit', $bukuBesar->total_kredit) }}" step="0.01">
                @if($errors->has('total_kredit'))
                    <span class="text-danger">{{ $errors->first('total_kredit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.bukuBesar.fields.total_kredit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.bukuBesar.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $bukuBesar->status) }}">
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.bukuBesar.fields.status_helper') }}</span>
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