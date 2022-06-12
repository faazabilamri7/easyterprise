@can('necara_saldo_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.necara-saldos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.necaraSaldo.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.necaraSaldo.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-akunNecaraSaldos">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.necaraSaldo.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.necaraSaldo.fields.tanggal') }}
                        </th>
                        <th>
                            {{ trans('cruds.necaraSaldo.fields.akun') }}
                        </th>
                        <th>
                            {{ trans('cruds.necaraSaldo.fields.debit') }}
                        </th>
                        <th>
                            {{ trans('cruds.necaraSaldo.fields.kredit') }}
                        </th>
                        <th>
                            {{ trans('cruds.necaraSaldo.fields.total_debit') }}
                        </th>
                        <th>
                            {{ trans('cruds.necaraSaldo.fields.total_kredit') }}
                        </th>
                        <th>
                            {{ trans('cruds.necaraSaldo.fields.total') }}
                        </th>
                        <th>
                            {{ trans('cruds.necaraSaldo.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($necaraSaldos as $key => $necaraSaldo)
                        <tr data-entry-id="{{ $necaraSaldo->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $necaraSaldo->id ?? '' }}
                            </td>
                            <td>
                                {{ $necaraSaldo->tanggal ?? '' }}
                            </td>
                            <td>
                                {{ $necaraSaldo->akun->nama ?? '' }}
                            </td>
                            <td>
                                {{ $necaraSaldo->debit ?? '' }}
                            </td>
                            <td>
                                {{ $necaraSaldo->kredit ?? '' }}
                            </td>
                            <td>
                                {{ $necaraSaldo->total_debit ?? '' }}
                            </td>
                            <td>
                                {{ $necaraSaldo->total_kredit ?? '' }}
                            </td>
                            <td>
                                {{ $necaraSaldo->total ?? '' }}
                            </td>
                            <td>
                                {{ $necaraSaldo->status ?? '' }}
                            </td>
                            <td>
                                @can('necara_saldo_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.necara-saldos.show', $necaraSaldo->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('necara_saldo_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.necara-saldos.edit', $necaraSaldo->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('necara_saldo_delete')
                                    <form action="{{ route('admin.necara-saldos.destroy', $necaraSaldo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('necara_saldo_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.necara-saldos.massDestroy') }}",
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
  let table = $('.datatable-akunNecaraSaldos:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection