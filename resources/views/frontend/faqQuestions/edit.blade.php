@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.faqQuestion.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.faq-questions.update", [$faqQuestion->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="category_id">{{ trans('cruds.faqQuestion.fields.category') }}</label>
                            <select class="form-control select2" name="category_id" id="category_id" required>
                                @foreach($categories as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $faqQuestion->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('category') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.faqQuestion.fields.category_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="question">{{ trans('cruds.faqQuestion.fields.question') }}</label>
                            <textarea class="form-control" name="question" id="question" required>{{ old('question', $faqQuestion->question) }}</textarea>
                            @if($errors->has('question'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('question') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.faqQuestion.fields.question_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="answer">{{ trans('cruds.faqQuestion.fields.answer') }}</label>
                            <textarea class="form-control" name="answer" id="answer" required>{{ old('answer', $faqQuestion->answer) }}</textarea>
                            @if($errors->has('answer'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('answer') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.faqQuestion.fields.answer_helper') }}</span>
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