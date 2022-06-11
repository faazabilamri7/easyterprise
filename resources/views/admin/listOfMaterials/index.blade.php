@extends('layouts.admin')
@section('content')
@can('list_of_material_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.list-of-materials.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.listOfMaterial.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'ListOfMaterial', 'route' => 'admin.list-of-materials.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.listOfMaterial.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-ListOfMaterial">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.listOfMaterial.fields.id_list_of_material') }}
                    </th>
                    <th>
                        {{ trans('cruds.listOfMaterial.fields.id_production_plan') }}
                    </th>
                    <th>
                        {{ trans('cruds.listOfMaterial.fields.request_air') }}
                    </th>
                    <th>
                        {{ trans('cruds.listOfMaterial.fields.request_sukrosa') }}
                    </th>
                    <th>
                        {{ trans('cruds.listOfMaterial.fields.request_dektrose') }}
                    </th>
                    <th>
                        {{ trans('cruds.listOfMaterial.fields.request_perisa_yakult') }}
                    </th>
                    <th>
                        {{ trans('cruds.listOfMaterial.fields.request_susu_bubuk_krim') }}
                    </th>
                    <th>
                        {{ trans('cruds.listOfMaterial.fields.request_polietilena_tereftalat') }}
                    </th>
                    <th>
                        {{ trans('cruds.listOfMaterial.fields.status') }}
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
@can('list_of_material_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.list-of-materials.massDestroy') }}",
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
    ajax: "{{ route('admin.list-of-materials.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id_list_of_material', name: 'id_list_of_material' },
{ data: 'id_production_plan_id_production_plan', name: 'id_production_plan.id_production_plan' },
{ data: 'request_air', name: 'request_air' },
{ data: 'request_sukrosa', name: 'request_sukrosa' },
{ data: 'request_dektrose', name: 'request_dektrose' },
{ data: 'request_perisa_yakult', name: 'request_perisa_yakult' },
{ data: 'request_susu_bubuk_krim', name: 'request_susu_bubuk_krim' },
{ data: 'request_polietilena_tereftalat', name: 'request_polietilena_tereftalat' },
{ data: 'status', name: 'status' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-ListOfMaterial').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection