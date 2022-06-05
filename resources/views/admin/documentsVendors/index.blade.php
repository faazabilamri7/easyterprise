@extends('layouts.admin')
@section('content')
@can('documents_vendor_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.documents-vendors.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.documentsVendor.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.documentsVendor.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DocumentsVendor">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.documentsVendor.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.documentsVendor.fields.vendor') }}
                        </th>
                        <th>
                            {{ trans('cruds.documentsVendor.fields.document_file') }}
                        </th>
                        <th>
                            {{ trans('cruds.documentsVendor.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.documentsVendor.fields.description') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($documentsVendors as $key => $documentsVendor)
                        <tr data-entry-id="{{ $documentsVendor->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $documentsVendor->id ?? '' }}
                            </td>
                            <td>
                                {{ $documentsVendor->vendor->nama_vendor ?? '' }}
                            </td>
                            <td>
                                @if($documentsVendor->document_file)
                                    <a href="{{ $documentsVendor->document_file->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $documentsVendor->name ?? '' }}
                            </td>
                            <td>
                                {{ $documentsVendor->description ?? '' }}
                            </td>
                            <td>
                                @can('documents_vendor_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.documents-vendors.show', $documentsVendor->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('documents_vendor_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.documents-vendors.edit', $documentsVendor->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('documents_vendor_delete')
                                    <form action="{{ route('admin.documents-vendors.destroy', $documentsVendor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('documents_vendor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.documents-vendors.massDestroy') }}",
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
  let table = $('.datatable-DocumentsVendor:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection