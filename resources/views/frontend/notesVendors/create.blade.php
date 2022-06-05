@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.notesVendor.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.notes-vendors.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="vendor_id">{{ trans('cruds.notesVendor.fields.vendor') }}</label>
                            <select class="form-control select2" name="vendor_id" id="vendor_id" required>
                                @foreach($vendors as $id => $entry)
                                    <option value="{{ $id }}" {{ old('vendor_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('vendor'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('vendor') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.notesVendor.fields.vendor_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="note">{{ trans('cruds.notesVendor.fields.note') }}</label>
                            <textarea class="form-control" name="note" id="note" required>{{ old('note') }}</textarea>
                            @if($errors->has('note'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('note') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.notesVendor.fields.note_helper') }}</span>
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