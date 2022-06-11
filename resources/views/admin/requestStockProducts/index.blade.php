@extends('layouts.admin')
@section('content')
@can('request_stock_product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.request-stock-products.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.requestStockProduct.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'RequestStockProduct', 'route' => 'admin.request-stock-products.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.requestStockProduct.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-RequestStockProduct">
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
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('request_stock_product_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.request-stock-products.massDestroy') }}",
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
    ajax: "{{ route('admin.request-stock-products.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id_request_product', name: 'id_request_product' },
{ data: 'inquiry_inquiry_kode', name: 'inquiry.inquiry_kode' },
{ data: 'tanggal_request', name: 'tanggal_request' },
{ data: 'request_product_name', name: 'request_product.name' },
{ data: 'qty', name: 'qty' },
{ data: 'status', name: 'status' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-RequestStockProduct').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection