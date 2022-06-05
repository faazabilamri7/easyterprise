@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.stokProduk.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.stok-produks.update", [$stokProduk->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nama_produk">{{ trans('cruds.stokProduk.fields.nama_produk') }}</label>
                <input class="form-control {{ $errors->has('nama_produk') ? 'is-invalid' : '' }}" type="text" name="nama_produk" id="nama_produk" value="{{ old('nama_produk', $stokProduk->nama_produk) }}">
                @if($errors->has('nama_produk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_produk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stokProduk.fields.nama_produk_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qty">{{ trans('cruds.stokProduk.fields.qty') }}</label>
                <input class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}" type="number" name="qty" id="qty" value="{{ old('qty', $stokProduk->qty) }}" step="1">
                @if($errors->has('qty'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qty') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stokProduk.fields.qty_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fotoproduk">{{ trans('cruds.stokProduk.fields.fotoproduk') }}</label>
                <div class="needsclick dropzone {{ $errors->has('fotoproduk') ? 'is-invalid' : '' }}" id="fotoproduk-dropzone">
                </div>
                @if($errors->has('fotoproduk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fotoproduk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stokProduk.fields.fotoproduk_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sku">{{ trans('cruds.stokProduk.fields.sku') }}</label>
                <input class="form-control {{ $errors->has('sku') ? 'is-invalid' : '' }}" type="text" name="sku" id="sku" value="{{ old('sku', $stokProduk->sku) }}">
                @if($errors->has('sku'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sku') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stokProduk.fields.sku_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="biaya_produksi">{{ trans('cruds.stokProduk.fields.biaya_produksi') }}</label>
                <input class="form-control {{ $errors->has('biaya_produksi') ? 'is-invalid' : '' }}" type="number" name="biaya_produksi" id="biaya_produksi" value="{{ old('biaya_produksi', $stokProduk->biaya_produksi) }}" step="0.01">
                @if($errors->has('biaya_produksi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('biaya_produksi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stokProduk.fields.biaya_produksi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="harga_jual">{{ trans('cruds.stokProduk.fields.harga_jual') }}</label>
                <input class="form-control {{ $errors->has('harga_jual') ? 'is-invalid' : '' }}" type="number" name="harga_jual" id="harga_jual" value="{{ old('harga_jual', $stokProduk->harga_jual) }}" step="0.01">
                @if($errors->has('harga_jual'))
                    <div class="invalid-feedback">
                        {{ $errors->first('harga_jual') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stokProduk.fields.harga_jual_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.stokProduk.fields.kategori') }}</label>
                @foreach(App\Models\StokProduk::KATEGORI_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('kategori') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="kategori_{{ $key }}" name="kategori" value="{{ $key }}" {{ old('kategori', $stokProduk->kategori) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="kategori_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('kategori'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kategori') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stokProduk.fields.kategori_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.fotoprodukDropzone = {
    url: '{{ route('admin.stok-produks.storeMedia') }}',
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
      $('form').find('input[name="fotoproduk"]').remove()
      $('form').append('<input type="hidden" name="fotoproduk" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="fotoproduk"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($stokProduk) && $stokProduk->fotoproduk)
      var file = {!! json_encode($stokProduk->fotoproduk) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="fotoproduk" value="' + file.file_name + '">')
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