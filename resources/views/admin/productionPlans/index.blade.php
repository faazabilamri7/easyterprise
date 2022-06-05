@extends('layouts.admin')
@section('content')
@can('production_plan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.production-plans.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.productionPlan.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.productionPlan.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ProductionPlan">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.productionPlan.fields.tugas') }}
                        </th>
                        <th>
                            {{ trans('cruds.productionPlan.fields.tanggal_mulai') }}
                        </th>
                        <th>
                            {{ trans('cruds.productionPlan.fields.durasi') }}
                        </th>
                        <th>
                            {{ trans('cruds.productionPlan.fields.rincian') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productionPlans as $key => $productionPlan)
                        <tr data-entry-id="{{ $productionPlan->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $productionPlan->tugas ?? '' }}
                            </td>
                            <td>
                                {{ $productionPlan->tanggal_mulai ?? '' }}
                            </td>
                            <td>
                                {{ $productionPlan->durasi ?? '' }}
                            </td>
                            <td>
                                {{ $productionPlan->rincian ?? '' }}
                            </td>
                            <td>
                                @can('production_plan_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.production-plans.show', $productionPlan->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('production_plan_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.production-plans.edit', $productionPlan->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('production_plan_delete')
                                    <form action="{{ route('admin.production-plans.destroy', $productionPlan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('production_plan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.production-plans.massDestroy') }}",
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
  let table = $('.datatable-ProductionPlan:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection