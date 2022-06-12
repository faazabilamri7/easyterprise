@can('request_stock_product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.request-stock-products.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.requestStockProduct.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.requestStockProduct.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-inquiryRequestStockProducts">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.requestStockProduct.fields.id_request_product') }}
                        </th>
                        <th>
                            {{ trans('cruds.requestStockProduct.fields.inquiry') }}
                        </th>
                        <th>
                            {{ trans('cruds.requestStockProduct.fields.tanggal_request') }}
                        </th>
                        <th>
                            {{ trans('cruds.requestStockProduct.fields.request_product') }}
                        </th>
                        <th>
                            {{ trans('cruds.requestStockProduct.fields.qty') }}
                        </th>
                        <th>
                            {{ trans('cruds.requestStockProduct.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requestStockProducts as $key => $requestStockProduct)
                        <tr data-entry-id="{{ $requestStockProduct->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $requestStockProduct->id_request_product ?? '' }}
                            </td>
                            <td>
                                {{ $requestStockProduct->inquiry->inquiry_kode ?? '' }}
                            </td>
                            <td>
                                {{ $requestStockProduct->tanggal_request ?? '' }}
                            </td>
                            <td>
                                {{ $requestStockProduct->request_product->name ?? '' }}
                            </td>
                            <td>
                                {{ $requestStockProduct->qty ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\RequestStockProduct::STATUS_SELECT[$requestStockProduct->status] ?? '' }}
                            </td>
                            <td>
                                @can('request_stock_product_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.request-stock-products.show', $requestStockProduct->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('request_stock_product_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.request-stock-products.edit', $requestStockProduct->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('request_stock_product_delete')
                                    <form action="{{ route('admin.request-stock-products.destroy', $requestStockProduct->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('request_stock_product_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.request-stock-products.massDestroy') }}",
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
  let table = $('.datatable-inquiryRequestStockProducts:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection