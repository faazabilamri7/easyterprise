@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.assetsHistory.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-AssetsHistory">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.assetsHistory.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.assetsHistory.fields.asset') }}
                    </th>
                    <th>
                        {{ trans('cruds.assetsHistory.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.assetsHistory.fields.location') }}
                    </th>
                    <th>
                        {{ trans('cruds.assetsHistory.fields.assigned_user') }}
                    </th>
                    <th>
                        {{ trans('cruds.assetsHistory.fields.created_at') }}
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
  
  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.assets-histories.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'asset_name', name: 'asset.name' },
{ data: 'status_name', name: 'status.name' },
{ data: 'location_name', name: 'location.name' },
{ data: 'assigned_user_name', name: 'assigned_user.name' },
{ data: 'created_at', name: 'created_at' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-AssetsHistory').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection