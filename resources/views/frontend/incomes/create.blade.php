@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.income.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.incomes.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="income_category_id">{{ trans('cruds.income.fields.income_category') }}</label>
                            <select class="form-control select2" name="income_category_id" id="income_category_id">
                                @foreach($income_categories as $id => $entry)
                                    <option value="{{ $id }}" {{ old('income_category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('income_category'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('income_category') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.income.fields.income_category_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="entry_date">{{ trans('cruds.income.fields.entry_date') }}</label>
                            <input class="form-control date" type="text" name="entry_date" id="entry_date" value="{{ old('entry_date') }}" required>
                            @if($errors->has('entry_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('entry_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.income.fields.entry_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="amount">{{ trans('cruds.income.fields.amount') }}</label>
                            <input class="form-control" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01" required>
                            @if($errors->has('amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.income.fields.amount_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.income.fields.description') }}</label>
                            <input class="form-control" type="text" name="description" id="description" value="{{ old('description', '') }}">
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.income.fields.description_helper') }}</span>
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