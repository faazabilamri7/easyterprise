@can('transfer_produk_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.transfer-produks.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.transferProduk.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.transferProduk.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-idQualityControlTransferProduks">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.transferProduk.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.transferProduk.fields.id_transfer_produk') }}
                        </th>
                        <th>
                            {{ trans('cruds.transferProduk.fields.id_quality_control') }}
                        </th>
                        <th>
                            {{ trans('cruds.transferProduk.fields.product_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.transferProduk.fields.qty') }}
                        </th>
                        <th>
                            {{ trans('cruds.transferProduk.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transferProduks as $key => $transferProduk)
                        <tr data-entry-id="{{ $transferProduk->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $transferProduk->id ?? '' }}
                            </td>
                            <td>
                                {{ $transferProduk->id_transfer_produk ?? '' }}
                            </td>
                            <td>
                                {{ $transferProduk->id_quality_control->id_quality_control ?? '' }}
                            </td>
                            <td>
                                {{ $transferProduk->product_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $transferProduk->qty ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\TransferProduk::STATUS_SELECT[$transferProduk->status] ?? '' }}
                            </td>
                            <td>
                                @can('transfer_produk_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.transfer-produks.show', $transferProduk->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('transfer_produk_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.transfer-produks.edit', $transferProduk->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('transfer_produk_delete')
                                    <form action="{{ route('admin.transfer-produks.destroy', $transferProduk->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('transfer_produk_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.transfer-produks.massDestroy') }}",
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
  let table = $('.datatable-idQualityControlTransferProduks:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection