@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.assetsHistory.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AssetsHistory">
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
                <tbody>
                    @foreach($assetsHistories as $key => $assetsHistory)
                        <tr data-entry-id="{{ $assetsHistory->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $assetsHistory->id ?? '' }}
                            </td>
                            <td>
                                {{ $assetsHistory->asset->name ?? '' }}
                            </td>
                            <td>
                                {{ $assetsHistory->status->name ?? '' }}
                            </td>
                            <td>
                                {{ $assetsHistory->location->name ?? '' }}
                            </td>
                            <td>
                                {{ $assetsHistory->assigned_user->name ?? '' }}
                            </td>
                            <td>
                                {{ $assetsHistory->created_at ?? '' }}
                            </td>
                            <td>



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
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-AssetsHistory:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection