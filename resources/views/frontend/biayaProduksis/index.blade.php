@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('biaya_produksi_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.biaya-produksis.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.biayaProduksi.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'BiayaProduksi', 'route' => 'admin.biaya-produksis.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.biayaProduksi.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-BiayaProduksi">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.biayaProduksi.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.biayaProduksi.fields.tanggal') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.biayaProduksi.fields.periode') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.biayaProduksi.fields.desc') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($biayaProduksis as $key => $biayaProduksi)
                                    <tr data-entry-id="{{ $biayaProduksi->id }}">
                                        <td>
                                            {{ $biayaProduksi->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $biayaProduksi->tanggal ?? '' }}
                                        </td>
                                        <td>
                                            {{ $biayaProduksi->periode ?? '' }}
                                        </td>
                                        <td>
                                            {{ $biayaProduksi->desc ?? '' }}
                                        </td>
                                        <td>
                                            @can('biaya_produksi_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.biaya-produksis.show', $biayaProduksi->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('biaya_produksi_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.biaya-produksis.edit', $biayaProduksi->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('biaya_produksi_delete')
                                                <form action="{{ route('frontend.biaya-produksis.destroy', $biayaProduksi->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('biaya_produksi_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.biaya-produksis.massDestroy') }}",
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
  let table = $('.datatable-BiayaProduksi:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection