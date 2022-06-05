@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.pengiriman.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.pengirimen.update", [$pengiriman->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="nama_customer">{{ trans('cruds.pengiriman.fields.nama_customer') }}</label>
                            <input class="form-control" type="text" name="nama_customer" id="nama_customer" value="{{ old('nama_customer', $pengiriman->nama_customer) }}">
                            @if($errors->has('nama_customer'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('nama_customer') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pengiriman.fields.nama_customer_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.pengiriman.fields.status_pengiriman') }}</label>
                            <select class="form-control" name="status_pengiriman" id="status_pengiriman">
                                <option value disabled {{ old('status_pengiriman', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Pengiriman::STATUS_PENGIRIMAN_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status_pengiriman', $pengiriman->status_pengiriman) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status_pengiriman'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status_pengiriman') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pengiriman.fields.status_pengiriman_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="alamat_pengiriman">{{ trans('cruds.pengiriman.fields.alamat_pengiriman') }}</label>
                            <textarea class="form-control" name="alamat_pengiriman" id="alamat_pengiriman">{{ old('alamat_pengiriman', $pengiriman->alamat_pengiriman) }}</textarea>
                            @if($errors->has('alamat_pengiriman'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('alamat_pengiriman') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pengiriman.fields.alamat_pengiriman_helper') }}</span>
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