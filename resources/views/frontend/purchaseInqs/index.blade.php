@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('purchase_inq_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.purchase-inqs.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.purchaseInq.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.purchaseInq.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-PurchaseInq">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.purchaseInq.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.purchaseInq.fields.id_request_for_quotation') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.purchaseInq.fields.date_purchase_inquiry') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.purchaseInq.fields.material_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.purchaseInq.fields.quantity') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($purchaseInqs as $key => $purchaseInq)
                                    <tr data-entry-id="{{ $purchaseInq->id }}">
                                        <td>
                                            {{ $purchaseInq->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $purchaseInq->id_request_for_quotation->id_purchase_requisition ?? '' }}
                                        </td>
                                        <td>
                                            {{ $purchaseInq->date_purchase_inquiry ?? '' }}
                                        </td>
                                        <td>
                                            {{ $purchaseInq->material_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $purchaseInq->quantity ?? '' }}
                                        </td>
                                        <td>
                                            @can('purchase_inq_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.purchase-inqs.show', $purchaseInq->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('purchase_inq_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.purchase-inqs.edit', $purchaseInq->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('purchase_inq_delete')
                                                <form action="{{ route('frontend.purchase-inqs.destroy', $purchaseInq->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('purchase_inq_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.purchase-inqs.massDestroy') }}",
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
  let table = $('.datatable-PurchaseInq:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection