@extends('layouts.admin')
@section('content')
@can('buku_besar_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.buku-besars.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.bukuBesar.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'BukuBesar', 'route' => 'admin.buku-besars.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.bukuBesar.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-BukuBesar">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.bukuBesar.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.bukuBesar.fields.tanggal') }}
                    </th>
                    <th>
                        {{ trans('cruds.bukuBesar.fields.akun') }}
                    </th>
                    <th>
                        {{ trans('cruds.bukuBesar.fields.keterangan') }}
                    </th>
                    <th>
                        {{ trans('cruds.bukuBesar.fields.debit') }}
                    </th>
                    <th>
                        {{ trans('cruds.bukuBesar.fields.kredit') }}
                    </th>
                    <th>
                        {{ trans('cruds.bukuBesar.fields.total_debit') }}
                    </th>
                    <th>
                        {{ trans('cruds.bukuBesar.fields.total_kredit') }}
                    </th>
                    <th>
                        {{ trans('cruds.bukuBesar.fields.status') }}
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
@can('buku_besar_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.buku-besars.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.buku-besars.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'tanggal', name: 'tanggal' },
{ data: 'akun_nama', name: 'akun.nama' },
{ data: 'keterangan', name: 'keterangan' },
{ data: 'debit', name: 'debit' },
{ data: 'kredit', name: 'kredit' },
{ data: 'total_debit', name: 'total_debit' },
{ data: 'total_kredit', name: 'total_kredit' },
{ data: 'status', name: 'status' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-BukuBesar').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection