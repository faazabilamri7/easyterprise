@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.crmNote.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.crm-notes.update", [$crmNote->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="customer_id">{{ trans('cruds.crmNote.fields.customer') }}</label>
                            <select class="form-control select2" name="customer_id" id="customer_id" required>
                                @foreach($customers as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('customer_id') ? old('customer_id') : $crmNote->customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('customer'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('customer') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.crmNote.fields.customer_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="note">{{ trans('cruds.crmNote.fields.note') }}</label>
                            <textarea class="form-control" name="note" id="note" required>{{ old('note', $crmNote->note) }}</textarea>
                            @if($errors->has('note'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('note') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection