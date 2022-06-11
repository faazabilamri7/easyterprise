@extends('layouts.admin')
@section('content')
@can('transaksi_keuangan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.transaksi-keuangans.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.transaksiKeuangan.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'TransaksiKeuangan', 'route' => 'admin.transaksi-keuangans.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.transaksiKeuangan.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-TransaksiKeuangan">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.transaksiKeuangan.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaksiKeuangan.fields.kas_bank') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaksiKeuangan.fields.tanggal') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaksiKeuangan.fields.desc') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaksiKeuangan.fields.nominal') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaksiKeuangan.fields.jenis_pembayaran') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaksiKeuangan.fields.qty') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaksiKeuangan.fields.harga_unit') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaksiKeuangan.fields.total') }}
                    </th>
                    <th>
                        {{ trans('cruds.transaksiKeuangan.fields.sales_product') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('transaksi_keuangan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.transaksi-keuangans.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.transaksi-keuangans.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'kas_bank_jumlah', name: 'kas_bank.jumlah' },
{ data: 'tanggal', name: 'tanggal' },
{ data: 'desc', name: 'desc' },
{ data: 'nominal', name: 'nominal' },
{ data: 'jenis_pembayaran', name: 'jenis_pembayaran' },
{ data: 'qty', name: 'qty' },
{ data: 'harga_unit', name: 'harga_unit' },
{ data: 'total', name: 'total' },
{ data: 'sales_product_detail_order', name: 'sales_product.detail_order' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-TransaksiKeuangan').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection