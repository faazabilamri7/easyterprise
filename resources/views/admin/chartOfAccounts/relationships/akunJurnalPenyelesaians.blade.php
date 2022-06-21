@can('jurnal_penyelesaian_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.jurnal-penyelesaians.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.jurnalPenyelesaian.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.jurnalPenyelesaian.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-akunJurnalPenyelesaians">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.jurnalPenyelesaian.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.jurnalPenyelesaian.fields.akun') }}
                        </th>
                        <th>
                            {{ trans('cruds.jurnalPenyelesaian.fields.keterangan') }}
                        </th>
                        <th>
                            {{ trans('cruds.jurnalPenyelesaian.fields.debit') }}
                        </th>
                        <th>
                            {{ trans('cruds.jurnalPenyelesaian.fields.kredit') }}
                        </th>
                        <th>
                            {{ trans('cruds.jurnalPenyelesaian.fields.total_debit') }}
                        </th>
                        <th>
                            {{ trans('cruds.jurnalPenyelesaian.fields.total_kredit') }}
                        </th>
                        <th>
                            {{ trans('cruds.jurnalPenyelesaian.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jurnalPenyelesaians as $key => $jurnalPenyelesaian)
                        <tr data-entry-id="{{ $jurnalPenyelesaian->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $jurnalPenyelesaian->id ?? '' }}
                            </td>
                            <td>
                                {{ $jurnalPenyelesaian->akun->account_name ?? '' }}
                            </td>
                            <td>
                                {{ $jurnalPenyelesaian->keterangan ?? '' }}
                            </td>
                            <td>
                                {{ $jurnalPenyelesaian->debit ?? '' }}
                            </td>
                            <td>
                                {{ $jurnalPenyelesaian->kredit ?? '' }}
                            </td>
                            <td>
                                {{ $jurnalPenyelesaian->total_debit ?? '' }}
                            </td>
                            <td>
                                {{ $jurnalPenyelesaian->total_kredit ?? '' }}
                            </td>
                            <td>
                                {{ $jurnalPenyelesaian->status ?? '' }}
                            </td>
                            <td>
                                @can('jurnal_penyelesaian_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.jurnal-penyelesaians.show', $jurnalPenyelesaian->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('jurnal_penyelesaian_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.jurnal-penyelesaians.edit', $jurnalPenyelesaian->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('jurnal_penyelesaian_delete')
                                    <form action="{{ route('admin.jurnal-penyelesaians.destroy', $jurnalPenyelesaian->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('jurnal_penyelesaian_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.jurnal-penyelesaians.massDestroy') }}",
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
  let table = $('.datatable-akunJurnalPenyelesaians:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection