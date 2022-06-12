@can('sales_order_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sales-orders.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.salesOrder.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.salesOrder.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-idSalesQuotationSalesOrders">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.salesOrder.fields.no_sales_order') }}
                        </th>
                        <th>
                            {{ trans('cruds.salesOrder.fields.id_sales_quotation') }}
                        </th>
                        <th>
                            {{ trans('cruds.salesQuotation.fields.id_sales_quotation') }}
                        </th>
                        <th>
                            {{ trans('cruds.salesOrder.fields.tanggal') }}
                        </th>
                        <th>
                            {{ trans('cruds.salesOrder.fields.detail_order') }}
                        </th>
                        <th>
                            {{ trans('cruds.salesOrder.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.salesOrder.fields.finance') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salesOrders as $key => $salesOrder)
                        <tr data-entry-id="{{ $salesOrder->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $salesOrder->no_sales_order ?? '' }}
                            </td>
                            <td>
                                {{ $salesOrder->id_sales_quotation->id_sales_quotation ?? '' }}
                            </td>
                            <td>
                                {{ $salesOrder->id_sales_quotation->id_sales_quotation ?? '' }}
                            </td>
                            <td>
                                {{ $salesOrder->tanggal ?? '' }}
                            </td>
                            <td>
                                {{ $salesOrder->detail_order ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\SalesOrder::STATUS_SELECT[$salesOrder->status] ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $salesOrder->finance ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $salesOrder->finance ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('sales_order_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.sales-orders.show', $salesOrder->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('sales_order_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.sales-orders.edit', $salesOrder->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('sales_order_delete')
                                    <form action="{{ route('admin.sales-orders.destroy', $salesOrder->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('sales_order_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sales-orders.massDestroy') }}",
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
  let table = $('.datatable-idSalesQuotationSalesOrders:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection