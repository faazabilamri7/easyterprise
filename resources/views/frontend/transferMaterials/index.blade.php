@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('transfer_material_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.transfer-materials.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.transferMaterial.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.transferMaterial.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-TransferMaterial">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transferMaterial.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transferMaterial.fields.tanggal_transaksi') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transferMaterial.fields.transfer_dari') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.transferMaterial.fields.transfer_ke') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transferMaterials as $key => $transferMaterial)
                                    <tr data-entry-id="{{ $transferMaterial->id }}">
                                        <td>
                                            {{ $transferMaterial->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $transferMaterial->tanggal_transaksi ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\TransferMaterial::TRANSFER_DARI_SELECT[$transferMaterial->transfer_dari] ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\TransferMaterial::TRANSFER_KE_SELECT[$transferMaterial->transfer_ke] ?? '' }}
                                        </td>
                                        <td>
                                            @can('transfer_material_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.transfer-materials.show', $transferMaterial->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('transfer_material_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.transfer-materials.edit', $transferMaterial->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('transfer_material_delete')
                                                <form action="{{ route('frontend.transfer-materials.destroy', $transferMaterial->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('transfer_material_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.transfer-materials.massDestroy') }}",
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
  let table = $('.datatable-TransferMaterial:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection