@can('purchase_requition_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.purchase-requitions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.purchaseRequition.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.purchaseRequition.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-material6PurchaseRequitions">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.id_purchase_requition') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.id_list_of_material') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.material_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.qty_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.material_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.qty_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.material_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.qty_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.material_4') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.qty_4') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.material_5') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.qty_5') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.material_6') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.qty_6') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchaseRequitions as $key => $purchaseRequition)
                        <tr data-entry-id="{{ $purchaseRequition->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $purchaseRequition->id_purchase_requition ?? '' }}
                            </td>
                            <td>
                                {{ $purchaseRequition->id_list_of_material->id_list_of_material ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PurchaseRequition::STATUS_SELECT[$purchaseRequition->status] ?? '' }}
                            </td>
                            <td>
                                {{ $purchaseRequition->material_1->name_material ?? '' }}
                            </td>
                            <td>
                                {{ $purchaseRequition->qty_1 ?? '' }}
                            </td>
                            <td>
                                {{ $purchaseRequition->material_2->name_material ?? '' }}
                            </td>
                            <td>
                                {{ $purchaseRequition->qty_2 ?? '' }}
                            </td>
                            <td>
                                {{ $purchaseRequition->material_3->name_material ?? '' }}
                            </td>
                            <td>
                                {{ $purchaseRequition->qty_3 ?? '' }}
                            </td>
                            <td>
                                {{ $purchaseRequition->material_4->name_material ?? '' }}
                            </td>
                            <td>
                                {{ $purchaseRequition->qty_4 ?? '' }}
                            </td>
                            <td>
                                {{ $purchaseRequition->material_5->name_material ?? '' }}
                            </td>
                            <td>
                                {{ $purchaseRequition->qty_5 ?? '' }}
                            </td>
                            <td>
                                {{ $purchaseRequition->material_6->name_material ?? '' }}
                            </td>
                            <td>
                                {{ $purchaseRequition->qty_6 ?? '' }}
                            </td>
                            <td>
                                @can('purchase_requition_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.purchase-requitions.show', $purchaseRequition->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('purchase_requition_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.purchase-requitions.edit', $purchaseRequition->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('purchase_requition_delete')
                                    <form action="{{ route('admin.purchase-requitions.destroy', $purchaseRequition->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('purchase_requition_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.purchase-requitions.massDestroy') }}",
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
  let table = $('.datatable-material6PurchaseRequitions:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection