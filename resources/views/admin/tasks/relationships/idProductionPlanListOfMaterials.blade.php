@can('list_of_material_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.list-of-materials.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.listOfMaterial.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.listOfMaterial.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-idProductionPlanListOfMaterials">
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
                <tbody>
                    @foreach($listOfMaterials as $key => $listOfMaterial)
                        <tr data-entry-id="{{ $listOfMaterial->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $listOfMaterial->id_list_of_material ?? '' }}
                            </td>
                            <td>
                                {{ $listOfMaterial->id_production_plan->id_production_plan ?? '' }}
                            </td>
                            <td>
                                {{ $listOfMaterial->request_air ?? '' }}
                            </td>
                            <td>
                                {{ $listOfMaterial->request_sukrosa ?? '' }}
                            </td>
                            <td>
                                {{ $listOfMaterial->request_dektrose ?? '' }}
                            </td>
                            <td>
                                {{ $listOfMaterial->request_perisa_yakult ?? '' }}
                            </td>
                            <td>
                                {{ $listOfMaterial->request_susu_bubuk_krim ?? '' }}
                            </td>
                            <td>
                                {{ $listOfMaterial->request_polietilena_tereftalat ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\ListOfMaterial::STATUS_SELECT[$listOfMaterial->status] ?? '' }}
                            </td>
                            <td>
                                @can('list_of_material_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.list-of-materials.show', $listOfMaterial->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('list_of_material_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.list-of-materials.edit', $listOfMaterial->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('list_of_material_delete')
                                    <form action="{{ route('admin.list-of-materials.destroy', $listOfMaterial->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('list_of_material_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.list-of-materials.massDestroy') }}",
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
  let table = $('.datatable-idProductionPlanListOfMaterials:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection