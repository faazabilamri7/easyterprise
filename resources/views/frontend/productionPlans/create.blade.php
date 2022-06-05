@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.productionPlan.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.production-plans.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="tugas">{{ trans('cruds.productionPlan.fields.tugas') }}</label>
                            <input class="form-control" type="text" name="tugas" id="tugas" value="{{ old('tugas', '') }}" required>
                            @if($errors->has('tugas'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tugas') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.productionPlan.fields.tugas_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="tanggal_mulai">{{ trans('cruds.productionPlan.fields.tanggal_mulai') }}</label>
                            <input class="form-control date" type="text" name="tanggal_mulai" id="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
                            @if($errors->has('tanggal_mulai'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tanggal_mulai') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.productionPlan.fields.tanggal_mulai_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="durasi">{{ trans('cruds.productionPlan.fields.durasi') }}</label>
                            <input class="form-control" type="text" name="durasi" id="durasi" value="{{ old('durasi', '') }}" required>
                            @if($errors->has('durasi'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('durasi') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.productionPlan.fields.durasi_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="rincian">{{ trans('cruds.productionPlan.fields.rincian') }}</label>
                            <input class="form-control" type="text" name="rincian" id="rincian" value="{{ old('rincian', '') }}">
                            @if($errors->has('rincian'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('rincian') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.productionPlan.fields.rincian_helper') }}</span>
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