@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('customer_complain_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.customer-complains.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.customerComplain.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'CustomerComplain', 'route' => 'admin.customer-complains.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.customerComplain.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-CustomerComplain">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.customerComplain.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.customerComplain.fields.sales_order') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.customerComplain.fields.keluhan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.customerComplain.fields.kritik') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.customerComplain.fields.saran') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customerComplains as $key => $customerComplain)
                                    <tr data-entry-id="{{ $customerComplain->id }}">
                                        <td>
                                            {{ $customerComplain->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $customerComplain->sales_order->no_sales_order ?? '' }}
                                        </td>
                                        <td>
                                            {{ $customerComplain->keluhan ?? '' }}
                                        </td>
                                        <td>
                                            {{ $customerComplain->kritik ?? '' }}
                                        </td>
                                        <td>
                                            {{ $customerComplain->saran ?? '' }}
                                        </td>
                                        <td>
                                            @can('customer_complain_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.customer-complains.show', $customerComplain->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('customer_complain_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.customer-complains.edit', $customerComplain->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('customer_complain_delete')
                                                <form action="{{ route('frontend.customer-complains.destroy', $customerComplain->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('customer_complain_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.customer-complains.massDestroy') }}",
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
  let table = $('.datatable-CustomerComplain:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection