@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.material.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.materials.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name_material">{{ trans('cruds.material.fields.name_material') }}</label>
                            <input class="form-control" type="text" name="name_material" id="name_material" value="{{ old('name_material', '') }}" required>
                            @if($errors->has('name_material'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name_material') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.material.fields.name_material_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="price">{{ trans('cruds.material.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01" required>
                            @if($errors->has('price'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.material.fields.price_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="descriptive">{{ trans('cruds.material.fields.descriptive') }}</label>
                            <textarea class="form-control" name="descriptive" id="descriptive">{{ old('descriptive') }}</textarea>
                            @if($errors->has('descriptive'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('descriptive') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.material.fields.descriptive_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="photo">{{ trans('cruds.material.fields.photo') }}</label>
                            <div class="needsclick dropzone" id="photo-dropzone">
                            </div>
                            @if($errors->has('photo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('photo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.material.fields.photo_helper') }}</span>
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

@section('scripts')
<script>
    var uploadedPhotoMap = {}
Dropzone.options.photoDropzone = {
    url: '{{ route('frontend.materials.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photo[]" value="' + response.name + '">')
      uploadedPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotoMap[file.name]
      }
      $('form').find('input[name="photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($material) && $material->photo)
      var files = {!! json_encode($material->photo) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photo[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection