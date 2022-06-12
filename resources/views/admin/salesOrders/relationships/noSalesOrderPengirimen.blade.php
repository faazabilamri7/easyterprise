<div class="m-3">
    @can('pengiriman_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.pengirimen.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.pengiriman.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.pengiriman.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-noSalesOrderPengirimen">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.pengiriman.fields.id_pengiriman') }}
                            </th>
                            <th>
                                {{ trans('cruds.pengiriman.fields.no_sales_order') }}
                            </th>
                            <th>
                                {{ trans('cruds.pengiriman.fields.status_pengiriman') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengirimen as $key => $pengiriman)
                            <tr data-entry-id="{{ $pengiriman->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $pengiriman->id_pengiriman ?? '' }}
                                </td>
                                <td>
                                    {{ $pengiriman->no_sales_order->no_sales_order ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Pengiriman::STATUS_PENGIRIMAN_SELECT[$pengiriman->status_pengiriman] ?? '' }}
                                </td>
                                <td>
                                    @can('pengiriman_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.pengirimen.show', $pengiriman->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('pengiriman_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.pengirimen.edit', $pengiriman->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('pengiriman_delete')
                                        <form action="{{ route('admin.pengirimen.destroy', $pengiriman->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('pengiriman_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pengirimen.massDestroy') }}",
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
  let table = $('.datatable-noSalesOrderPengirimen:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection