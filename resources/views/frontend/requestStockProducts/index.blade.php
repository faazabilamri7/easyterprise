@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('request_stock_product_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.request-stock-products.create') }}">
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
                        <table class=" table table-bordered table-striped table-hover datatable datatable-RequestStockProduct">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.requestStockProduct.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.requestStockProduct.fields.tanggal_request') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.requestStockProduct.fields.inquiry') }}
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
                                            {{ $requestStockProduct->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $requestStockProduct->tanggal_request ?? '' }}
                                        </td>
                                        <td>
                                            {{ $requestStockProduct->inquiry->inquiry ?? '' }}
                                        </td>
                                        <td>
                                            @can('request_stock_product_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.request-stock-products.show', $requestStockProduct->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('request_stock_product_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.request-stock-products.edit', $requestStockProduct->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('request_stock_product_delete')
                                                <form action="{{ route('frontend.request-stock-products.destroy', $requestStockProduct->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('request_stock_product_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.request-stock-products.massDestroy') }}",
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
  let table = $('.datatable-RequestStockProduct:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection