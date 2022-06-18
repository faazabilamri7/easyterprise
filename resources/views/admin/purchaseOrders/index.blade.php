@extends('layouts.admin')
@section('content')
@can('purchase_order_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.purchase-orders.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.purchaseOrder.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'PurchaseOrder', 'route' => 'admin.purchase-orders.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.purchaseOrder.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-PurchaseOrder">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.id_purchase_order') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.id_purchase_quotation') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.date_purchase_order') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.material_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseOrder.fields.qty') }}
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
@can('purchase_order_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.purchase-orders.massDestroy') }}",
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
    ajax: "{{ route('admin.purchase-orders.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id_purchase_order', name: 'id_purchase_order' },
{ data: 'id_purchase_quotation_id_purchase_quotation', name: 'id_purchase_quotation.id_purchase_quotation' },
{ data: 'date_purchase_order', name: 'date_purchase_order' },
{ data: 'material_name_name_material', name: 'material_name.name_material' },
{ data: 'qty', name: 'qty' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-PurchaseOrder').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection