@extends('layouts.admin')
@section('content')
@can('purchase_requition_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.purchase-requitions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.purchaseRequition.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'PurchaseRequition', 'route' => 'admin.purchase-requitions.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.purchaseRequition.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-PurchaseRequition">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.purchaseRequition.fields.id_purchase_requition') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseRequition.fields.id_list_of_material') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseRequition.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseRequition.fields.material_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseRequition.fields.qty_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseRequition.fields.material_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseRequition.fields.qty_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseRequition.fields.material_3') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseRequition.fields.qty_3') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseRequition.fields.material_4') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseRequition.fields.qty_4') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseRequition.fields.material_5') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseRequition.fields.qty_5') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseRequition.fields.material_6') }}
                    </th>
                    <th>
                        {{ trans('cruds.purchaseRequition.fields.qty_6') }}
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
@can('purchase_requition_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.purchase-requitions.massDestroy') }}",
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
    ajax: "{{ route('admin.purchase-requitions.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id_purchase_requition', name: 'id_purchase_requition' },
{ data: 'id_list_of_material_id_list_of_material', name: 'id_list_of_material.id_list_of_material' },
{ data: 'status', name: 'status' },
{ data: 'material_1_name_material', name: 'material_1.name_material' },
{ data: 'qty_1', name: 'qty_1' },
{ data: 'material_2_name_material', name: 'material_2.name_material' },
{ data: 'qty_2', name: 'qty_2' },
{ data: 'material_3_name_material', name: 'material_3.name_material' },
{ data: 'qty_3', name: 'qty_3' },
{ data: 'material_4_name_material', name: 'material_4.name_material' },
{ data: 'qty_4', name: 'qty_4' },
{ data: 'material_5_name_material', name: 'material_5.name_material' },
{ data: 'qty_5', name: 'qty_5' },
{ data: 'material_6_name_material', name: 'material_6.name_material' },
{ data: 'qty_6', name: 'qty_6' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-PurchaseRequition').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection