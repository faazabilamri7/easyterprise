@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.necaraSaldo.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.necara-saldos.update", [$necaraSaldo->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="tanggal">{{ trans('cruds.necaraSaldo.fields.tanggal') }}</label>
                <input class="form-control date {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $necaraSaldo->tanggal) }}">
                @if($errors->has('tanggal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.necaraSaldo.fields.tanggal_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="akun_id">{{ trans('cruds.necaraSaldo.fields.akun') }}</label>
                <select class="form-control select2 {{ $errors->has('akun') ? 'is-invalid' : '' }}" name="akun_id" id="akun_id" required>
                    @foreach($akuns as $id => $entry)
                        <option value="{{ $id }}" {{ (old('akun_id') ? old('akun_id') : $necaraSaldo->akun->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('akun'))
                    <div class="invalid-feedback">
                        {{ $errors->first('akun') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.necaraSaldo.fields.akun_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="debit">{{ trans('cruds.necaraSaldo.fields.debit') }}</label>
                <input class="form-control {{ $errors->has('debit') ? 'is-invalid' : '' }}" type="number" name="debit" id="debit" value="{{ old('debit', $necaraSaldo->debit) }}" step="0.01">
                @if($errors->has('debit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('debit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.necaraSaldo.fields.debit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kredit">{{ trans('cruds.necaraSaldo.fields.kredit') }}</label>
                <input class="form-control {{ $errors->has('kredit') ? 'is-invalid' : '' }}" type="number" name="kredit" id="kredit" value="{{ old('kredit', $necaraSaldo->kredit) }}" step="0.01">
                @if($errors->has('kredit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kredit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.necaraSaldo.fields.kredit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_debit">{{ trans('cruds.necaraSaldo.fields.total_debit') }}</label>
                <input class="form-control {{ $errors->has('total_debit') ? 'is-invalid' : '' }}" type="number" name="total_debit" id="total_debit" value="{{ old('total_debit', $necaraSaldo->total_debit) }}" step="0.01">
                @if($errors->has('total_debit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_debit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.necaraSaldo.fields.total_debit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_kredit">{{ trans('cruds.necaraSaldo.fields.total_kredit') }}</label>
                <input class="form-control {{ $errors->has('total_kredit') ? 'is-invalid' : '' }}" type="number" name="total_kredit" id="total_kredit" value="{{ old('total_kredit', $necaraSaldo->total_kredit) }}" step="0.01">
                @if($errors->has('total_kredit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_kredit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.necaraSaldo.fields.total_kredit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total">{{ trans('cruds.necaraSaldo.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="number" name="total" id="total" value="{{ old('total', $necaraSaldo->total) }}" step="0.01">
                @if($errors->has('total'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.necaraSaldo.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.necaraSaldo.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $necaraSaldo->status) }}">
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.necaraSaldo.fields.status_helper') }}</span>
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