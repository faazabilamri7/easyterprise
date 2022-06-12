@extends('layouts.admin')
@section('content')
@can('sales_order_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sales-orders.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.salesOrder.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'SalesOrder', 'route' => 'admin.sales-orders.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.salesOrder.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-SalesOrder">
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
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('sales_order_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sales-orders.massDestroy') }}",
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
    ajax: "{{ route('admin.sales-orders.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'no_sales_order', name: 'no_sales_order' },
{ data: 'id_sales_quotation_id_sales_quotation', name: 'id_sales_quotation.id_sales_quotation' },
{ data: 'id_sales_quotation.id_sales_quotation', name: 'id_sales_quotation.id_sales_quotation' },
{ data: 'tanggal', name: 'tanggal' },
{ data: 'detail_order', name: 'detail_order' },
{ data: 'status', name: 'status' },
{ data: 'finance', name: 'finance' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-SalesOrder').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection