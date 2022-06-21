@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.chartOfAccount.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.chart-of-accounts.update", [$chartOfAccount->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="account_code">{{ trans('cruds.chartOfAccount.fields.account_code') }}</label>
                <input class="form-control {{ $errors->has('account_code') ? 'is-invalid' : '' }}" type="text" name="account_code" id="account_code" value="{{ old('account_code', $chartOfAccount->account_code) }}" required>
                @if($errors->has('account_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.chartOfAccount.fields.account_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="account_name">{{ trans('cruds.chartOfAccount.fields.account_name') }}</label>
                <input class="form-control {{ $errors->has('account_name') ? 'is-invalid' : '' }}" type="text" name="account_name" id="account_name" value="{{ old('account_name', $chartOfAccount->account_name) }}" required>
                @if($errors->has('account_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.chartOfAccount.fields.account_name_helper') }}</span>
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