@can('purchase_invoice_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.purchase-invoices.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.purchaseInvoice.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.purchaseInvoice.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-purchaseOrderPurchaseInvoices">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.purchaseInvoice.fields.no_purchase_invoice') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseInvoice.fields.purchase_invoice') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseInvoice.fields.purchase_order') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseInvoice.fields.tanggal') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseInvoice.fields.bukti_pembayaran') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseInvoice.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchaseInvoices as $key => $purchaseInvoice)
                        <tr data-entry-id="{{ $purchaseInvoice->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $purchaseInvoice->no_purchase_invoice ?? '' }}
                            </td>
                            <td>
                                @if($purchaseInvoice->purchase_invoice)
                                    <a href="{{ $purchaseInvoice->purchase_invoice->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $purchaseInvoice->purchase_order->date_purchase_order ?? '' }}
                            </td>
                            <td>
                                {{ $purchaseInvoice->tanggal ?? '' }}
                            </td>
                            <td>
                                @if($purchaseInvoice->bukti_pembayaran)
                                    <a href="{{ $purchaseInvoice->bukti_pembayaran->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $purchaseInvoice->bukti_pembayaran->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ App\Models\PurchaseInvoice::STATUS_RADIO[$purchaseInvoice->status] ?? '' }}
                            </td>
                            <td>
                                @can('purchase_invoice_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.purchase-invoices.show', $purchaseInvoice->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('purchase_invoice_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.purchase-invoices.edit', $purchaseInvoice->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('purchase_invoice_delete')
                                    <form action="{{ route('admin.purchase-invoices.destroy', $purchaseInvoice->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('purchase_invoice_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.purchase-invoices.massDestroy') }}",
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
  let table = $('.datatable-purchaseOrderPurchaseInvoices:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection