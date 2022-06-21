@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.salesInvoice.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sales-invoices.update", [$salesInvoice->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="no_sales_invoice">{{ trans('cruds.salesInvoice.fields.no_sales_invoice') }}</label>
                <input class="form-control {{ $errors->has('no_sales_invoice') ? 'is-invalid' : '' }}" type="text" name="no_sales_invoice" id="no_sales_invoice" value="{{ old('no_sales_invoice', $salesInvoice->no_sales_invoice) }}">
                @if($errors->has('no_sales_invoice'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_sales_invoice') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salesInvoice.fields.no_sales_invoice_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sales_invoice">{{ trans('cruds.salesInvoice.fields.sales_invoice') }}</label>
                <div class="needsclick dropzone {{ $errors->has('sales_invoice') ? 'is-invalid' : '' }}" id="sales_invoice-dropzone">
                </div>
                @if($errors->has('sales_invoice'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sales_invoice') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salesInvoice.fields.sales_invoice_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sales_order_id">{{ trans('cruds.salesInvoice.fields.sales_order') }}</label>
                <select class="form-control select2 {{ $errors->has('sales_order') ? 'is-invalid' : '' }}" name="sales_order_id" id="sales_order_id">
                    @foreach($sales_orders as $id => $entry)
                        <option value="{{ $id }}" {{ (old('sales_order_id') ? old('sales_order_id') : $salesInvoice->sales_order->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('sales_order'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sales_order') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salesInvoice.fields.sales_order_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jatuh_tempo">{{ trans('cruds.salesInvoice.fields.jatuh_tempo') }}</label>
                <input class="form-control date {{ $errors->has('jatuh_tempo') ? 'is-invalid' : '' }}" type="text" name="jatuh_tempo" id="jatuh_tempo" value="{{ old('jatuh_tempo', $salesInvoice->jatuh_tempo) }}">
                @if($errors->has('jatuh_tempo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jatuh_tempo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salesInvoice.fields.jatuh_tempo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bukti_pembayaran">{{ trans('cruds.salesInvoice.fields.bukti_pembayaran') }}</label>
                <div class="needsclick dropzone {{ $errors->has('bukti_pembayaran') ? 'is-invalid' : '' }}" id="bukti_pembayaran-dropzone">
                </div>
                @if($errors->has('bukti_pembayaran'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bukti_pembayaran') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salesInvoice.fields.bukti_pembayaran_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.salesInvoice.fields.status') }}</label>
                @foreach(App\Models\SalesInvoice::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', $salesInvoice->status) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salesInvoice.fields.status_helper') }}</span>
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
    Dropzone.options.salesInvoiceDropzone = {
    url: '{{ route('admin.sales-invoices.storeMedia') }}',
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
      $('form').find('input[name="sales_invoice"]').remove()
      $('form').append('<input type="hidden" name="sales_invoice" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="sales_invoice"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($salesInvoice) && $salesInvoice->sales_invoice)
      var file = {!! json_encode($salesInvoice->sales_invoice) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="sales_invoice" value="' + file.file_name + '">')
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
    url: '{{ route('admin.sales-invoices.storeMedia') }}',
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
@if(isset($salesInvoice) && $salesInvoice->bukti_pembayaran)
      var file = {!! json_encode($salesInvoice->bukti_pembayaran) !!}
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