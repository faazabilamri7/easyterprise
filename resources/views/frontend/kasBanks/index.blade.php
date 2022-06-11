@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('kas_bank_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.kas-banks.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.kasBank.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'KasBank', 'route' => 'admin.kas-banks.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.kasBank.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-KasBank">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.kasBank.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.kasBank.fields.tanggal') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.kasBank.fields.reff') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.kasBank.fields.transaksi') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.kasBank.fields.jumlah') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kasBanks as $key => $kasBank)
                                    <tr data-entry-id="{{ $kasBank->id }}">
                                        <td>
                                            {{ $kasBank->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $kasBank->tanggal ?? '' }}
                                        </td>
                                        <td>
                                            {{ $kasBank->reff ?? '' }}
                                        </td>
                                        <td>
                                            {{ $kasBank->transaksi ?? '' }}
                                        </td>
                                        <td>
                                            {{ $kasBank->jumlah ?? '' }}
                                        </td>
                                        <td>
                                            @can('kas_bank_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.kas-banks.show', $kasBank->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('kas_bank_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.kas-banks.edit', $kasBank->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('kas_bank_delete')
                                                <form action="{{ route('frontend.kas-banks.destroy', $kasBank->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('kas_bank_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.kas-banks.massDestroy') }}",
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
  let table = $('.datatable-KasBank:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection