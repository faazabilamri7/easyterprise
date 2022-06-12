@extends('layouts.admin')
@section('content')
@can('material_entry_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.material-entries.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.materialEntry.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'MaterialEntry', 'route' => 'admin.material-entries.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.materialEntry.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-MaterialEntry">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.materialEntry.fields.id_material_entry') }}
                    </th>
                    <th>
                        {{ trans('cruds.materialEntry.fields.id_purchase_order') }}
                    </th>
                    <th>
                        {{ trans('cruds.materialEntry.fields.date_material_entry') }}
                    </th>
                    <th>
                        {{ trans('cruds.materialEntry.fields.material_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.materialEntry.fields.qty') }}
                    </th>
                    <th>
                        {{ trans('cruds.materialEntry.fields.status') }}
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
@can('material_entry_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.material-entries.massDestroy') }}",
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
    ajax: "{{ route('admin.material-entries.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id_material_entry', name: 'id_material_entry' },
{ data: 'id_purchase_order_id_purchase_order', name: 'id_purchase_order.id_purchase_order' },
{ data: 'date_material_entry', name: 'date_material_entry' },
{ data: 'material_name', name: 'material_name' },
{ data: 'qty', name: 'qty' },
{ data: 'status', name: 'status' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-MaterialEntry').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection