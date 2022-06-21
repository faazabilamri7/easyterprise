@can('jurnal_umum_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.jurnal-umums.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.jurnalUmum.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.jurnalUmum.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-akunJurnalUmums">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.jurnalUmum.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.jurnalUmum.fields.akun') }}
                        </th>
                        <th>
                            {{ trans('cruds.jurnalUmum.fields.tanggal') }}
                        </th>
                        <th>
                            {{ trans('cruds.jurnalUmum.fields.nama') }}
                        </th>
                        <th>
                            {{ trans('cruds.jurnalUmum.fields.debit') }}
                        </th>
                        <th>
                            {{ trans('cruds.jurnalUmum.fields.kredit') }}
                        </th>
                        <th>
                            {{ trans('cruds.jurnalUmum.fields.total_debit') }}
                        </th>
                        <th>
                            {{ trans('cruds.jurnalUmum.fields.total_kredit') }}
                        </th>
                        <th>
                            {{ trans('cruds.jurnalUmum.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jurnalUmums as $key => $jurnalUmum)
                        <tr data-entry-id="{{ $jurnalUmum->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $jurnalUmum->id ?? '' }}
                            </td>
                            <td>
                                {{ $jurnalUmum->akun->account_code ?? '' }}
                            </td>
                            <td>
                                {{ $jurnalUmum->tanggal ?? '' }}
                            </td>
                            <td>
                                {{ $jurnalUmum->nama ?? '' }}
                            </td>
                            <td>
                                {{ $jurnalUmum->debit ?? '' }}
                            </td>
                            <td>
                                {{ $jurnalUmum->kredit ?? '' }}
                            </td>
                            <td>
                                {{ $jurnalUmum->total_debit ?? '' }}
                            </td>
                            <td>
                                {{ $jurnalUmum->total_kredit ?? '' }}
                            </td>
                            <td>
                                {{ $jurnalUmum->status ?? '' }}
                            </td>
                            <td>
                                @can('jurnal_umum_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.jurnal-umums.show', $jurnalUmum->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('jurnal_umum_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.jurnal-umums.edit', $jurnalUmum->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('jurnal_umum_delete')
                                    <form action="{{ route('admin.jurnal-umums.destroy', $jurnalUmum->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('jurnal_umum_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.jurnal-umums.massDestroy') }}",
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
  let table = $('.datatable-akunJurnalUmums:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection