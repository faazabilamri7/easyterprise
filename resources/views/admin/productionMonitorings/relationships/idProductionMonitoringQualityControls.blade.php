@can('quality_control_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.quality-controls.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.qualityControl.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.qualityControl.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-idProductionMonitoringQualityControls">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.qualityControl.fields.id_quality_control') }}
                        </th>
                        <th>
                            {{ trans('cruds.qualityControl.fields.id_production_monitoring') }}
                        </th>
                        <th>
                            {{ trans('cruds.qualityControl.fields.qty') }}
                        </th>
                        <th>
                            {{ trans('cruds.qualityControl.fields.qty_failed') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($qualityControls as $key => $qualityControl)
                        <tr data-entry-id="{{ $qualityControl->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $qualityControl->id_quality_control ?? '' }}
                            </td>
                            <td>
                                {{ $qualityControl->id_production_monitoring->id_production_monitoring ?? '' }}
                            </td>
                            <td>
                                {{ $qualityControl->qty ?? '' }}
                            </td>
                            <td>
                                {{ $qualityControl->qty_failed ?? '' }}
                            </td>
                            <td>
                                @can('quality_control_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.quality-controls.show', $qualityControl->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('quality_control_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.quality-controls.edit', $qualityControl->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('quality_control_delete')
                                    <form action="{{ route('admin.quality-controls.destroy', $qualityControl->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('quality_control_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.quality-controls.massDestroy') }}",
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
  let table = $('.datatable-idProductionMonitoringQualityControls:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection