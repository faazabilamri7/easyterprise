@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('stok_produk_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.stok-produks.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.stokProduk.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.stokProduk.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-StokProduk">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.stokProduk.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.stokProduk.fields.nama_produk') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.stokProduk.fields.qty') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.stokProduk.fields.fotoproduk') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.stokProduk.fields.sku') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.stokProduk.fields.biaya_produksi') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.stokProduk.fields.harga_jual') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.stokProduk.fields.kategori') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stokProduks as $key => $stokProduk)
                                    <tr data-entry-id="{{ $stokProduk->id }}">
                                        <td>
                                            {{ $stokProduk->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $stokProduk->nama_produk ?? '' }}
                                        </td>
                                        <td>
                                            {{ $stokProduk->qty ?? '' }}
                                        </td>
                                        <td>
                                            @if($stokProduk->fotoproduk)
                                                <a href="{{ $stokProduk->fotoproduk->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $stokProduk->fotoproduk->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $stokProduk->sku ?? '' }}
                                        </td>
                                        <td>
                                            {{ $stokProduk->biaya_produksi ?? '' }}
                                        </td>
                                        <td>
                                            {{ $stokProduk->harga_jual ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\StokProduk::KATEGORI_RADIO[$stokProduk->kategori] ?? '' }}
                                        </td>
                                        <td>
                                            @can('stok_produk_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.stok-produks.show', $stokProduk->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('stok_produk_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.stok-produks.edit', $stokProduk->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('stok_produk_delete')
                                                <form action="{{ route('frontend.stok-produks.destroy', $stokProduk->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('stok_produk_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.stok-produks.massDestroy') }}",
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
  let table = $('.datatable-StokProduk:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection