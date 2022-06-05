@extends('layouts.admin')
@section('content')
@can('purchas_req_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.purchas-reqs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.purchasReq.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.purchasReq.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PurchasReq">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.purchasReq.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchasReq.fields.id_list_of_material') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchasReq.fields.date_purchase_requisition') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchasReq.fields.total_price') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchasReq.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchasReqs as $key => $purchasReq)
                        <tr data-entry-id="{{ $purchasReq->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $purchasReq->id ?? '' }}
                            </td>
                            <td>
                                {{ $purchasReq->id_list_of_material ?? '' }}
                            </td>
                            <td>
                                {{ $purchasReq->date_purchase_requisition ?? '' }}
                            </td>
                            <td>
                                {{ $purchasReq->total_price ?? '' }}
                            </td>
                            <td>
                                {{ $purchasReq->status ?? '' }}
                            </td>
                            <td>
                                @can('purchas_req_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.purchas-reqs.show', $purchasReq->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('purchas_req_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.purchas-reqs.edit', $purchasReq->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('purchas_req_delete')
                                    <form action="{{ route('admin.purchas-reqs.destroy', $purchasReq->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('purchas_req_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.purchas-reqs.massDestroy') }}",
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
  let table = $('.datatable-PurchasReq:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection