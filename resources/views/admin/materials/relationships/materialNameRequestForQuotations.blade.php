@can('request_for_quotation_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.request-for-quotations.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.requestForQuotation.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.requestForQuotation.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-materialNameRequestForQuotations">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.requestForQuotation.fields.id_request_for_quotation') }}
                        </th>
                        <th>
                            {{ trans('cruds.requestForQuotation.fields.id_purchase_requisition') }}
                        </th>
                        <th>
                            {{ trans('cruds.requestForQuotation.fields.material_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.requestForQuotation.fields.qty') }}
                        </th>
                        <th>
                            {{ trans('cruds.requestForQuotation.fields.unit_price') }}
                        </th>
                        <th>
                            {{ trans('cruds.requestForQuotation.fields.total_price') }}
                        </th>
                        <th>
                            {{ trans('cruds.requestForQuotation.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.requestForQuotation.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requestForQuotations as $key => $requestForQuotation)
                        <tr data-entry-id="{{ $requestForQuotation->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $requestForQuotation->id_request_for_quotation ?? '' }}
                            </td>
                            <td>
                                {{ $requestForQuotation->id_purchase_requisition->id_purchase_requition ?? '' }}
                            </td>
                            <td>
                                {{ $requestForQuotation->material_name->name_material ?? '' }}
                            </td>
                            <td>
                                {{ $requestForQuotation->qty ?? '' }}
                            </td>
                            <td>
                                {{ $requestForQuotation->unit_price ?? '' }}
                            </td>
                            <td>
                                {{ $requestForQuotation->total_price ?? '' }}
                            </td>
                            <td>
                                {{ $requestForQuotation->description ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\RequestForQuotation::STATUS_SELECT[$requestForQuotation->status] ?? '' }}
                            </td>
                            <td>
                                @can('request_for_quotation_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.request-for-quotations.show', $requestForQuotation->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('request_for_quotation_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.request-for-quotations.edit', $requestForQuotation->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('request_for_quotation_delete')
                                    <form action="{{ route('admin.request-for-quotations.destroy', $requestForQuotation->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('request_for_quotation_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.request-for-quotations.massDestroy') }}",
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
  let table = $('.datatable-materialNameRequestForQuotations:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection