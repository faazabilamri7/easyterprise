@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.crmNote.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.crm-notes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="customer_id">{{ trans('cruds.crmNote.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                    @foreach($customers as $id => $entry)
                        <option value="{{ $id }}" {{ old('customer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <span class="text-danger">{{ $errors->first('customer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.crmNote.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keluhan">{{ trans('cruds.crmNote.fields.keluhan') }}</label>
                <input class="form-control {{ $errors->has('keluhan') ? 'is-invalid' : '' }}" type="text" name="keluhan" id="keluhan" value="{{ old('keluhan', '') }}">
                @if($errors->has('keluhan'))
                    <span class="text-danger">{{ $errors->first('keluhan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.crmNote.fields.keluhan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kritik">{{ trans('cruds.crmNote.fields.kritik') }}</label>
                <input class="form-control {{ $errors->has('kritik') ? 'is-invalid' : '' }}" type="text" name="kritik" id="kritik" value="{{ old('kritik', '') }}">
                @if($errors->has('kritik'))
                    <span class="text-danger">{{ $errors->first('kritik') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.crmNote.fields.kritik_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="saran">{{ trans('cruds.crmNote.fields.saran') }}</label>
                <input class="form-control {{ $errors->has('saran') ? 'is-invalid' : '' }}" type="text" name="saran" id="saran" value="{{ old('saran', '') }}">
                @if($errors->has('saran'))
                    <span class="text-danger">{{ $errors->first('saran') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.crmNote.fields.saran_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="note">{{ trans('cruds.crmNote.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note" required>{{ old('note') }}</textarea>
                @if($errors->has('note'))
                    <span class="text-danger">{{ $errors->first('note') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.crmNote.fields.note_helper') }}</span>
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