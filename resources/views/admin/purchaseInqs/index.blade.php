@extends('layouts.admin')
@section('content')
@can('purchase_inq_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.purchase-inqs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.purchaseInq.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'PurchaseInq', 'route' => 'admin.purchase-inqs.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.purchaseInq.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-PurchaseInq">
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
                        {{ trans('cruds.purchaseInq.fields.material_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseInq.fields.qty') }}
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
@can('purchase_inq_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.purchase-inqs.massDestroy') }}",
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
    ajax: "{{ route('admin.purchase-inqs.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id_purchase_inquiry', name: 'id_purchase_inquiry' },
{ data: 'id_request_for_quotation_id_request_for_quotation', name: 'id_request_for_quotation.id_request_for_quotation' },
{ data: 'vendor_name_nama_vendor', name: 'vendor_name.nama_vendor' },
{ data: 'date_puchase_inquiry', name: 'date_puchase_inquiry' },
{ data: 'material_name_name_material', name: 'material_name.name_material' },
{ data: 'qty', name: 'qty' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-PurchaseInq').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection