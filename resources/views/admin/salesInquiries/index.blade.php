@extends('layouts.admin')
@section('content')
@can('sales_inquiry_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sales-inquiries.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.salesInquiry.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'SalesInquiry', 'route' => 'admin.sales-inquiries.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.salesInquiry.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-SalesInquiry">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.salesInquiry.fields.inquiry_kode') }}
                    </th>
                    <th>
                        {{ trans('cruds.salesInquiry.fields.tgl_inquiry') }}
                    </th>
                    <th>
                        {{ trans('cruds.salesInquiry.fields.id_customer') }}
                    </th>
                    <th>
                        {{ trans('cruds.salesInquiry.fields.nama_produk') }}
                    </th>
                    <th>
                        {{ trans('cruds.salesInquiry.fields.qty') }}
                    </th>
                    <th>
                        {{ trans('cruds.salesInquiry.fields.status') }}
                    </th>
                    <th>
                        {{ trans('cruds.salesInquiry.fields.catatan') }}
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
@can('sales_inquiry_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sales-inquiries.massDestroy') }}",
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
    ajax: "{{ route('admin.sales-inquiries.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'inquiry_kode', name: 'inquiry_kode' },
{ data: 'tgl_inquiry', name: 'tgl_inquiry' },
{ data: 'id_customer_first_name', name: 'id_customer.first_name' },
{ data: 'nama_produk_name', name: 'nama_produk.name' },
{ data: 'qty', name: 'qty' },
{ data: 'status', name: 'status' },
{ data: 'catatan', name: 'catatan' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-SalesInquiry').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection