@extends('layouts.admin')
@section('content')
@can('purchase_quotation_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.purchase-quotations.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.purchaseQuotation.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.purchaseQuotation.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PurchaseQuotation">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.purchaseQuotation.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseQuotation.fields.id_purchase_quotation') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseQuotation.fields.id_purchase_inquiry') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseQuotation.fields.id_vendor') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseQuotation.fields.material_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseQuotation.fields.unit_price') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseQuotation.fields.total_price') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseQuotation.fields.payment_method') }}
                        </th>
                        <th>
                            {{ trans('cruds.purchaseQuotation.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchaseQuotations as $key => $purchaseQuotation)
                        <tr data-entry-id="{{ $purchaseQuotation->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $purchaseQuotation->id ?? '' }}
                            </td>
                            <td>
                                {{ $purchaseQuotation->id_purchase_quotation ?? '' }}
                            </td>
                            <td>
                                {{ $purchaseQuotation->id_purchase_inquiry->id_purchase_inquiry ?? '' }}
                            </td>
                            <td>
                                {{ $purchaseQuotation->id_vendor->nama_vendor ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PurchaseQuotation::MATERIAL_NAME_SELECT[$purchaseQuotation->material_name] ?? '' }}
                            </td>
                            <td>
                                {{ $purchaseQuotation->unit_price ?? '' }}
                            </td>
                            <td>
                                {{ $purchaseQuotation->total_price ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PurchaseQuotation::PAYMENT_METHOD_SELECT[$purchaseQuotation->payment_method] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\PurchaseQuotation::STATUS_SELECT[$purchaseQuotation->status] ?? '' }}
                            </td>
                            <td>
                                @can('purchase_quotation_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.purchase-quotations.show', $purchaseQuotation->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('purchase_quotation_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.purchase-quotations.edit', $purchaseQuotation->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('purchase_quotation_delete')
                                    <form action="{{ route('admin.purchase-quotations.destroy', $purchaseQuotation->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('purchase_quotation_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.purchase-quotations.massDestroy') }}",
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
  let table = $('.datatable-PurchaseQuotation:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection