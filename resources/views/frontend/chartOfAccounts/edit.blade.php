@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.chartOfAccount.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.chart-of-accounts.update", [$chartOfAccount->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="account_code">{{ trans('cruds.chartOfAccount.fields.account_code') }}</label>
                            <input class="form-control" type="text" name="account_code" id="account_code" value="{{ old('account_code', $chartOfAccount->account_code) }}" required>
                            @if($errors->has('account_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('account_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.chartOfAccount.fields.account_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="account_name">{{ trans('cruds.chartOfAccount.fields.account_name') }}</label>
                            <input class="form-control" type="text" name="account_name" id="account_name" value="{{ old('account_name', $chartOfAccount->account_name) }}" required>
                            @if($errors->has('account_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('account_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.chartOfAccount.fields.account_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.chartOfAccount.fields.category') }}</label>
                            <select class="form-control" name="category" id="category" required>
                                <option value disabled {{ old('category', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\ChartOfAccount::CATEGORY_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('category', $chartOfAccount->category) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('category') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.chartOfAccount.fields.category_helper') }}</span>
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