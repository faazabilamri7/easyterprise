@extends('layouts.admin')
@section('content')
@can('purchase_quotation_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.purchase-quotations.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.purchaseQuotation.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'PurchaseQuotation', 'route' => 'admin.purchase-quotations.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.purchaseQuotation.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-PurchaseQuotation">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.purchaseQuotation.fields.id_purchase_quotation') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseQuotation.fields.id_purchase_inquiry') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseQuotation.fields.id_vendor') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseQuotation.fields.material_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseQuotation.fields.unit_price') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseQuotation.fields.total_price') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseQuotation.fields.payment_method') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseQuotation.fields.status') }}
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
@can('purchase_quotation_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.purchase-quotations.massDestroy') }}",
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
    ajax: "{{ route('admin.purchase-quotations.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id_purchase_quotation', name: 'id_purchase_quotation' },
{ data: 'id_purchase_inquiry_id_purchase_inquiry', name: 'id_purchase_inquiry.id_purchase_inquiry' },
{ data: 'id_vendor_nama_vendor', name: 'id_vendor.nama_vendor' },
{ data: 'material_name', name: 'material_name' },
{ data: 'unit_price', name: 'unit_price' },
{ data: 'total_price', name: 'total_price' },
{ data: 'payment_method', name: 'payment_method' },
{ data: 'status', name: 'status' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-PurchaseQuotation').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection