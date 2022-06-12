<div class="m-3">
    @can('purchase_inq_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.purchase-inqs.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.purchaseInq.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.purchaseInq.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-idRequestForQuotationPurchaseInqs">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.purchaseInq.fields.id_purchase_inquiry') }}
                            </th>
                            <th>
                                {{ trans('cruds.purchaseInq.fields.id_request_for_quotation') }}
                            </th>
                            <th>
                                {{ trans('cruds.purchaseInq.fields.vendor_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.purchaseInq.fields.date_puchase_inquiry') }}
                            </th>
                            <th>
                                {{ trans('cruds.purchaseInq.fields.name_material') }}
                            </th>
                            <th>
                                {{ trans('cruds.purchaseInq.fields.qty') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($purchaseInqs as $key => $purchaseInq)
                            <tr data-entry-id="{{ $purchaseInq->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $purchaseInq->id_purchase_inquiry ?? '' }}
                                </td>
                                <td>
                                    {{ $purchaseInq->id_request_for_quotation->id_request_for_quotation ?? '' }}
                                </td>
                                <td>
                                    {{ $purchaseInq->vendor_name->nama_vendor ?? '' }}
                                </td>
                                <td>
                                    {{ $purchaseInq->date_puchase_inquiry ?? '' }}
                                </td>
                                <td>
                                    {{ $purchaseInq->name_material->name_material ?? '' }}
                                </td>
                                <td>
                                    {{ $purchaseInq->qty ?? '' }}
                                </td>
                                <td>
                                    @can('purchase_inq_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.purchase-inqs.show', $purchaseInq->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('purchase_inq_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.purchase-inqs.edit', $purchaseInq->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('purchase_inq_delete')
                                        <form action="{{ route('admin.purchase-inqs.destroy', $purchaseInq->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('purchase_inq_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.purchase-inqs.massDestroy') }}",
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
  let table = $('.datatable-idRequestForQuotationPurchaseInqs:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection