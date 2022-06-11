<div class="m-3">
    @can('production_monitoring_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.production-monitorings.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.productionMonitoring.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.productionMonitoring.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-idListOfMaterialProductionMonitorings">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.productionMonitoring.fields.id_production_monitoring') }}
                            </th>
                            <th>
                                {{ trans('cruds.productionMonitoring.fields.id_list_of_material') }}
                            </th>
                            <th>
                                {{ trans('cruds.listOfMaterial.fields.id_list_of_material') }}
                            </th>
                            <th>
                                {{ trans('cruds.productionMonitoring.fields.status') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productionMonitorings as $key => $productionMonitoring)
                            <tr data-entry-id="{{ $productionMonitoring->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $productionMonitoring->id_production_monitoring ?? '' }}
                                </td>
                                <td>
                                    {{ $productionMonitoring->id_list_of_material->id_list_of_material ?? '' }}
                                </td>
                                <td>
                                    {{ $productionMonitoring->id_list_of_material->id_list_of_material ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\ProductionMonitoring::STATUS_SELECT[$productionMonitoring->status] ?? '' }}
                                </td>
                                <td>
                                    @can('production_monitoring_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.production-monitorings.show', $productionMonitoring->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('production_monitoring_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.production-monitorings.edit', $productionMonitoring->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('production_monitoring_delete')
                                        <form action="{{ route('admin.production-monitorings.destroy', $productionMonitoring->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('production_monitoring_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.production-monitorings.massDestroy') }}",
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
  let table = $('.datatable-idListOfMaterialProductionMonitorings:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection