<div class="m-3">
    @can('buku_besar_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.buku-besars.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.bukuBesar.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.bukuBesar.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-akunBukuBesars">
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
                    <tbody>
                        @foreach($bukuBesars as $key => $bukuBesar)
                            <tr data-entry-id="{{ $bukuBesar->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $bukuBesar->id ?? '' }}
                                </td>
                                <td>
                                    {{ $bukuBesar->tanggal ?? '' }}
                                </td>
                                <td>
                                    {{ $bukuBesar->akun->nama ?? '' }}
                                </td>
                                <td>
                                    {{ $bukuBesar->keterangan ?? '' }}
                                </td>
                                <td>
                                    {{ $bukuBesar->debit ?? '' }}
                                </td>
                                <td>
                                    {{ $bukuBesar->kredit ?? '' }}
                                </td>
                                <td>
                                    {{ $bukuBesar->total_debit ?? '' }}
                                </td>
                                <td>
                                    {{ $bukuBesar->total_kredit ?? '' }}
                                </td>
                                <td>
                                    {{ $bukuBesar->status ?? '' }}
                                </td>
                                <td>
                                    @can('buku_besar_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.buku-besars.show', $bukuBesar->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('buku_besar_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.buku-besars.edit', $bukuBesar->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('buku_besar_delete')
                                        <form action="{{ route('admin.buku-besars.destroy', $bukuBesar->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('buku_besar_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.buku-besars.massDestroy') }}",
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
  let table = $('.datatable-akunBukuBesars:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection