@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('chart_of_account_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.chart-of-accounts.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.chartOfAccount.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'ChartOfAccount', 'route' => 'admin.chart-of-accounts.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.chartOfAccount.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ChartOfAccount">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.chartOfAccount.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.chartOfAccount.fields.account_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.chartOfAccount.fields.account_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.chartOfAccount.fields.category') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($chartOfAccounts as $key => $chartOfAccount)
                                    <tr data-entry-id="{{ $chartOfAccount->id }}">
                                        <td>
                                            {{ $chartOfAccount->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $chartOfAccount->account_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $chartOfAccount->account_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ChartOfAccount::CATEGORY_SELECT[$chartOfAccount->category] ?? '' }}
                                        </td>
                                        <td>
                                            @can('chart_of_account_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.chart-of-accounts.show', $chartOfAccount->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('chart_of_account_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.chart-of-accounts.edit', $chartOfAccount->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('chart_of_account_delete')
                                                <form action="{{ route('frontend.chart-of-accounts.destroy', $chartOfAccount->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('chart_of_account_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.chart-of-accounts.massDestroy') }}",
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
  let table = $('.datatable-ChartOfAccount:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection