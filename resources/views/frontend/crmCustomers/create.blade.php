@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.crmCustomer.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.crm-customers.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="first_name">{{ trans('cruds.crmCustomer.fields.first_name') }}</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}" required>
                            @if($errors->has('first_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('first_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.crmCustomer.fields.first_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="status_id">{{ trans('cruds.crmCustomer.fields.status') }}</label>
                            <select class="form-control select2" name="status_id" id="status_id" required>
                                @foreach($statuses as $id => $entry)
                                    <option value="{{ $id }}" {{ old('status_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.crmCustomer.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="email">{{ trans('cruds.crmCustomer.fields.email') }}</label>
                            <input class="form-control" type="text" name="email" id="email" value="{{ old('email', '') }}">
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.crmCustomer.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ trans('cruds.crmCustomer.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                            @if($errors->has('phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.crmCustomer.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="address">{{ trans('cruds.crmCustomer.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', '') }}">
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.crmCustomer.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="website">{{ trans('cruds.crmCustomer.fields.website') }}</label>
                            <input class="form-control" type="text" name="website" id="website" value="{{ old('website', '') }}">
                            @if($errors->has('website'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('website') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.crmCustomer.fields.website_helper') }}</span>
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