@extends('layouts.admin')
@section('content')
@can('sales_invoice_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sales-invoices.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.salesInvoice.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'SalesInvoice', 'route' => 'admin.sales-invoices.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.salesInvoice.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-SalesInvoice">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.salesInvoice.fields.no_sales_invoice') }}
                    </th>
                    <th>
                        {{ trans('cruds.salesInvoice.fields.sales_invoice') }}
                    </th>
                    <th>
                        {{ trans('cruds.salesInvoice.fields.sales_order') }}
                    </th>
                    <th>
                        {{ trans('cruds.salesInvoice.fields.jatuh_tempo') }}
                    </th>
                    <th>
                        {{ trans('cruds.salesInvoice.fields.bukti_pembayaran') }}
                    </th>
                    <th>
                        {{ trans('cruds.salesInvoice.fields.status') }}
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
@can('sales_invoice_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sales-invoices.massDestroy') }}",
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
    ajax: "{{ route('admin.sales-invoices.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'no_sales_invoice', name: 'no_sales_invoice' },
{ data: 'sales_invoice', name: 'sales_invoice', sortable: false, searchable: false },
{ data: 'sales_order_no_sales_order', name: 'sales_order.no_sales_order' },
{ data: 'jatuh_tempo', name: 'jatuh_tempo' },
{ data: 'bukti_pembayaran', name: 'bukti_pembayaran', sortable: false, searchable: false },
{ data: 'status', name: 'status' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-SalesInvoice').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection