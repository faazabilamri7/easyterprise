@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.purchaseInvoice.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.purchase-invoices.update", [$purchaseInvoice->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="no_purchase_invoice">{{ trans('cruds.purchaseInvoice.fields.no_purchase_invoice') }}</label>
                <input class="form-control {{ $errors->has('no_purchase_invoice') ? 'is-invalid' : '' }}" type="text" name="no_purchase_invoice" id="no_purchase_invoice" value="{{ old('no_purchase_invoice', $purchaseInvoice->no_purchase_invoice) }}">
                @if($errors->has('no_purchase_invoice'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_purchase_invoice') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseInvoice.fields.no_purchase_invoice_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="purchase_invoice">{{ trans('cruds.purchaseInvoice.fields.purchase_invoice') }}</label>
                <div class="needsclick dropzone {{ $errors->has('purchase_invoice') ? 'is-invalid' : '' }}" id="purchase_invoice-dropzone">
                </div>
                @if($errors->has('purchase_invoice'))
                    <div class="invalid-feedback">
                        {{ $errors->first('purchase_invoice') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseInvoice.fields.purchase_invoice_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="purchase_order_id">{{ trans('cruds.purchaseInvoice.fields.purchase_order') }}</label>
                <select class="form-control select2 {{ $errors->has('purchase_order') ? 'is-invalid' : '' }}" name="purchase_order_id" id="purchase_order_id">
                    @foreach($purchase_orders as $id => $entry)
                        <option value="{{ $id }}" {{ (old('purchase_order_id') ? old('purchase_order_id') : $purchaseInvoice->purchase_order->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('purchase_order'))
                    <div class="invalid-feedback">
                        {{ $errors->first('purchase_order') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseInvoice.fields.purchase_order_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tanggal">{{ trans('cruds.purchaseInvoice.fields.tanggal') }}</label>
                <input class="form-control date {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $purchaseInvoice->tanggal) }}">
                @if($errors->has('tanggal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseInvoice.fields.tanggal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bukti_pembayaran">{{ trans('cruds.purchaseInvoice.fields.bukti_pembayaran') }}</label>
                <div class="needsclick dropzone {{ $errors->has('bukti_pembayaran') ? 'is-invalid' : '' }}" id="bukti_pembayaran-dropzone">
                </div>
                @if($errors->has('bukti_pembayaran'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bukti_pembayaran') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseInvoice.fields.bukti_pembayaran_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.purchaseInvoice.fields.status') }}</label>
                @foreach(App\Models\PurchaseInvoice::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', $purchaseInvoice->status) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseInvoice.fields.status_helper') }}</span>
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
    Dropzone.options.purchaseInvoiceDropzone = {
    url: '{{ route('admin.purchase-invoices.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="purchase_invoice"]').remove()
      $('form').append('<input type="hidden" name="purchase_invoice" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="purchase_invoice"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($purchaseInvoice) && $purchaseInvoice->purchase_invoice)
      var file = {!! json_encode($purchaseInvoice->purchase_invoice) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="purchase_invoice" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.buktiPembayaranDropzone = {
    url: '{{ route('admin.purchase-invoices.storeMedia') }}',
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
      $('form').find('input[name="bukti_pembayaran"]').remove()
      $('form').append('<input type="hidden" name="bukti_pembayaran" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="bukti_pembayaran"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($purchaseInvoice) && $purchaseInvoice->bukti_pembayaran)
      var file = {!! json_encode($purchaseInvoice->bukti_pembayaran) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="bukti_pembayaran" value="' + file.file_name + '">')
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