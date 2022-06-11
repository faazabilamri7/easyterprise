@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('invoice_pembelian_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.invoice-pembelians.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.invoicePembelian.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'InvoicePembelian', 'route' => 'admin.invoice-pembelians.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.invoicePembelian.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-InvoicePembelian">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoicePembelian.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.invoicePembelian.fields.nomor') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.invoicePembelian.fields.tanggal') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.invoicePembelian.fields.perusahaan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.invoicePembelian.fields.customer') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.invoicePembelian.fields.total') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoicePembelians as $key => $invoicePembelian)
                                    <tr data-entry-id="{{ $invoicePembelian->id }}">
                                        <td>
                                            {{ $invoicePembelian->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $invoicePembelian->nomor ?? '' }}
                                        </td>
                                        <td>
                                            {{ $invoicePembelian->tanggal ?? '' }}
                                        </td>
                                        <td>
                                            {{ $invoicePembelian->perusahaan->nama_vendor ?? '' }}
                                        </td>
                                        <td>
                                            {{ $invoicePembelian->customer->first_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $invoicePembelian->total ?? '' }}
                                        </td>
                                        <td>
                                            @can('invoice_pembelian_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.invoice-pembelians.show', $invoicePembelian->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('invoice_pembelian_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.invoice-pembelians.edit', $invoicePembelian->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('invoice_pembelian_delete')
                                                <form action="{{ route('frontend.invoice-pembelians.destroy', $invoicePembelian->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('invoice_pembelian_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.invoice-pembelians.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-InvoicePembelian:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection