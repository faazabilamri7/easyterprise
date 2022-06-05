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
            <table class=" table table-bordered table-striped table-hover datatable datatable-productionPlanListOfMaterials">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.listOfMaterial.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.listOfMaterial.fields.production_plan') }}
                        </th>
                        <th>
                            {{ trans('cruds.listOfMaterial.fields.tanggal_mulai') }}
                        </th>
                        <th>
                            {{ trans('cruds.listOfMaterial.fields.tanggal_selesai') }}
                        </th>
                        <th>
                            {{ trans('cruds.listOfMaterial.fields.pilihan_bahan_baku') }}
                        </th>
                        <th>
                            {{ trans('cruds.listOfMaterial.fields.qty') }}
                        </th>
                        <th>
                            {{ trans('cruds.listOfMaterial.fields.harga_satuan') }}
                        </th>
                        <th>
                            {{ trans('cruds.listOfMaterial.fields.total') }}
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
                                {{ $listOfMaterial->id ?? '' }}
                            </td>
                            <td>
                                {{ $listOfMaterial->production_plan->tugas ?? '' }}
                            </td>
                            <td>
                                {{ $listOfMaterial->tanggal_mulai ?? '' }}
                            </td>
                            <td>
                                {{ $listOfMaterial->tanggal_selesai ?? '' }}
                            </td>
                            <td>
                                {{ $listOfMaterial->pilihan_bahan_baku ?? '' }}
                            </td>
                            <td>
                                {{ $listOfMaterial->qty ?? '' }}
                            </td>
                            <td>
                                {{ $listOfMaterial->harga_satuan ?? '' }}
                            </td>
                            <td>
                                {{ $listOfMaterial->total ?? '' }}
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
  let table = $('.datatable-productionPlanListOfMaterials:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection