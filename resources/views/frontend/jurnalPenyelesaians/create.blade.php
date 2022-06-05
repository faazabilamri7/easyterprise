@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.jurnalPenyelesaian.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.jurnal-penyelesaians.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="akun_id">{{ trans('cruds.jurnalPenyelesaian.fields.akun') }}</label>
                            <select class="form-control select2" name="akun_id" id="akun_id">
                                @foreach($akuns as $id => $entry)
                                    <option value="{{ $id }}" {{ old('akun_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('akun'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('akun') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.jurnalPenyelesaian.fields.akun_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">{{ trans('cruds.jurnalPenyelesaian.fields.keterangan') }}</label>
                            <input class="form-control" type="text" name="keterangan" id="keterangan" value="{{ old('keterangan', '') }}">
                            @if($errors->has('keterangan'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('keterangan') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.jurnalPenyelesaian.fields.keterangan_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="debit">{{ trans('cruds.jurnalPenyelesaian.fields.debit') }}</label>
                            <input class="form-control" type="number" name="debit" id="debit" value="{{ old('debit', '') }}" step="0.01">
                            @if($errors->has('debit'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('debit') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.jurnalPenyelesaian.fields.debit_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="kredit">{{ trans('cruds.jurnalPenyelesaian.fields.kredit') }}</label>
                            <input class="form-control" type="number" name="kredit" id="kredit" value="{{ old('kredit', '') }}" step="0.01">
                            @if($errors->has('kredit'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('kredit') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.jurnalPenyelesaian.fields.kredit_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="total_debit">{{ trans('cruds.jurnalPenyelesaian.fields.total_debit') }}</label>
                            <input class="form-control" type="number" name="total_debit" id="total_debit" value="{{ old('total_debit', '') }}" step="0.01">
                            @if($errors->has('total_debit'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('total_debit') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.jurnalPenyelesaian.fields.total_debit_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="total_kredit">{{ trans('cruds.jurnalPenyelesaian.fields.total_kredit') }}</label>
                            <input class="form-control" type="number" name="total_kredit" id="total_kredit" value="{{ old('total_kredit', '') }}" step="0.01">
                            @if($errors->has('total_kredit'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('total_kredit') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.jurnalPenyelesaian.fields.total_kredit_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.jurnalPenyelesaian.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', '') }}">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.jurnalPenyelesaian.fields.status_helper') }}</span>
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