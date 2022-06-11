<div class="m-3">
    @can('transaksi_keuangan_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.transaksi-keuangans.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.transaksiKeuangan.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.transaksiKeuangan.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-kasBankTransaksiKeuangans">
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
                    <tbody>
                        @foreach($transaksiKeuangans as $key => $transaksiKeuangan)
                            <tr data-entry-id="{{ $transaksiKeuangan->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $transaksiKeuangan->id ?? '' }}
                                </td>
                                <td>
                                    {{ $transaksiKeuangan->kas_bank->jumlah ?? '' }}
                                </td>
                                <td>
                                    {{ $transaksiKeuangan->tanggal ?? '' }}
                                </td>
                                <td>
                                    {{ $transaksiKeuangan->desc ?? '' }}
                                </td>
                                <td>
                                    {{ $transaksiKeuangan->nominal ?? '' }}
                                </td>
                                <td>
                                    {{ $transaksiKeuangan->jenis_pembayaran ?? '' }}
                                </td>
                                <td>
                                    {{ $transaksiKeuangan->qty ?? '' }}
                                </td>
                                <td>
                                    {{ $transaksiKeuangan->harga_unit ?? '' }}
                                </td>
                                <td>
                                    {{ $transaksiKeuangan->total ?? '' }}
                                </td>
                                <td>
                                    {{ $transaksiKeuangan->sales_product->detail_order ?? '' }}
                                </td>
                                <td>
                                    @can('transaksi_keuangan_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.transaksi-keuangans.show', $transaksiKeuangan->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('transaksi_keuangan_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.transaksi-keuangans.edit', $transaksiKeuangan->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('transaksi_keuangan_delete')
                                        <form action="{{ route('admin.transaksi-keuangans.destroy', $transaksiKeuangan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('transaksi_keuangan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.transaksi-keuangans.massDestroy') }}",
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
  let table = $('.datatable-kasBankTransaksiKeuangans:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection