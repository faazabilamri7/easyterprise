@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.product.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.products.update", [$product->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.product.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="foto_produk">{{ trans('cruds.product.fields.foto_produk') }}</label>
                            <div class="needsclick dropzone" id="foto_produk-dropzone">
                            </div>
                            @if($errors->has('foto_produk'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('foto_produk') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.foto_produk_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.product.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description', $product->description) }}</textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="categories">{{ trans('cruds.product.fields.category') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="categories[]" id="categories" multiple>
                                @foreach($categories as $id => $category)
                                    <option value="{{ $id }}" {{ (in_array($id, old('categories', [])) || $product->categories->contains($id)) ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('categories'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('categories') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.category_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.product.fields.tag') }}</label>
                            @foreach(App\Models\Product::TAG_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="tag_{{ $key }}" name="tag" value="{{ $key }}" {{ old('tag', $product->tag) === (string) $key ? 'checked' : '' }}>
                                    <label for="tag_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('tag'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tag') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.tag_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="stok">{{ trans('cruds.product.fields.stok') }}</label>
                            <input class="form-control" type="number" name="stok" id="stok" value="{{ old('stok', $product->stok) }}" step="1" required>
                            @if($errors->has('stok'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('stok') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.stok_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="harga_jual">{{ trans('cruds.product.fields.harga_jual') }}</label>
                            <input class="form-control" type="number" name="harga_jual" id="harga_jual" value="{{ old('harga_jual', $product->harga_jual) }}" step="0.01">
                            @if($errors->has('harga_jual'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('harga_jual') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.harga_jual_helper') }}</span>
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
    Dropzone.options.fotoProdukDropzone = {
    url: '{{ route('frontend.products.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
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
      $('form').find('input[name="foto_produk"]').remove()
      $('form').append('<input type="hidden" name="foto_produk" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="foto_produk"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($product) && $product->foto_produk)
      var file = {!! json_encode($product->foto_produk) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="foto_produk" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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