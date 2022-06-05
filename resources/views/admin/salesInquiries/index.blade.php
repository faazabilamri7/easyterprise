@extends('layouts.admin')
@section('content')
@can('sales_inquiry_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.sales-inquiries.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.salesInquiry.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.salesInquiry.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SalesInquiry">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.salesInquiry.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.salesInquiry.fields.id_customer') }}
                        </th>
                        <th>
                            {{ trans('cruds.salesInquiry.fields.inquiry') }}
                        </th>
                        <th>
                            {{ trans('cruds.salesInquiry.fields.tgl_inquiry') }}
                        </th>
                        <th>
                            {{ trans('cruds.salesInquiry.fields.id_product') }}
                        </th>
                        <th>
                            {{ trans('cruds.salesInquiry.fields.qty') }}
                        </th>
                        <th>
                            {{ trans('cruds.salesInquiry.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salesInquiries as $key => $salesInquiry)
                        <tr data-entry-id="{{ $salesInquiry->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $salesInquiry->id ?? '' }}
                            </td>
                            <td>
                                {{ $salesInquiry->id_customer->first_name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\SalesInquiry::INQUIRY_SELECT[$salesInquiry->inquiry] ?? '' }}
                            </td>
                            <td>
                                {{ $salesInquiry->tgl_inquiry ?? '' }}
                            </td>
                            <td>
                                {{ $salesInquiry->id_product->name ?? '' }}
                            </td>
                            <td>
                                {{ $salesInquiry->qty ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\SalesInquiry::STATUS_SELECT[$salesInquiry->status] ?? '' }}
                            </td>
                            <td>
                                @can('sales_inquiry_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.sales-inquiries.show', $salesInquiry->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('sales_inquiry_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.sales-inquiries.edit', $salesInquiry->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('sales_inquiry_delete')
                                    <form action="{{ route('admin.sales-inquiries.destroy', $salesInquiry->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('sales_inquiry_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sales-inquiries.massDestroy') }}",
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
  let table = $('.datatable-SalesInquiry:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection