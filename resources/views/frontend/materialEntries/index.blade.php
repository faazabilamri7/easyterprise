@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('material_entry_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.material-entries.create') }}">
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
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-MaterialEntry">
                            <thead>
                                <tr>
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
                            <tbody>
                                @foreach($materialEntries as $key => $materialEntry)
                                    <tr data-entry-id="{{ $materialEntry->id }}">
                                        <td>
                                            {{ $materialEntry->id_material_entry ?? '' }}
                                        </td>
                                        <td>
                                            {{ $materialEntry->id_purchase_order->id_purchase_order ?? '' }}
                                        </td>
                                        <td>
                                            {{ $materialEntry->date_material_entry ?? '' }}
                                        </td>
                                        <td>
                                            {{ $materialEntry->material_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $materialEntry->qty ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\MaterialEntry::STATUS_SELECT[$materialEntry->status] ?? '' }}
                                        </td>
                                        <td>
                                            @can('material_entry_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.material-entries.show', $materialEntry->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('material_entry_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.material-entries.edit', $materialEntry->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('material_entry_delete')
                                                <form action="{{ route('frontend.material-entries.destroy', $materialEntry->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('material_entry_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.material-entries.massDestroy') }}",
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
  let table = $('.datatable-MaterialEntry:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection