@can('sales_quotation_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sales-quotations.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.salesQuotation.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.salesQuotation.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-kodeInquirySalesQuotations">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.salesQuotation.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.salesQuotation.fields.kode_inquiry') }}
                        </th>
                        <th>
                            {{ trans('cruds.salesQuotation.fields.harga') }}
                        </th>
                        <th>
                            {{ trans('cruds.salesQuotation.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salesQuotations as $key => $salesQuotation)
                        <tr data-entry-id="{{ $salesQuotation->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $salesQuotation->id ?? '' }}
                            </td>
                            <td>
                                {{ $salesQuotation->kode_inquiry->nama_material ?? '' }}
                            </td>
                            <td>
                                {{ $salesQuotation->harga ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\SalesQuotation::STATUS_SELECT[$salesQuotation->status] ?? '' }}
                            </td>
                            <td>
                                @can('sales_quotation_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.sales-quotations.show', $salesQuotation->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('sales_quotation_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.sales-quotations.edit', $salesQuotation->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('sales_quotation_delete')
                                    <form action="{{ route('admin.sales-quotations.destroy', $salesQuotation->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('sales_quotation_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sales-quotations.massDestroy') }}",
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
  let table = $('.datatable-kodeInquirySalesQuotations:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection