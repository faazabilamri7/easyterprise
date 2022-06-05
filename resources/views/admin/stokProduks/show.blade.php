@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.stokProduk.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stok-produks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.stokProduk.fields.id') }}
                        </th>
                        <td>
                            {{ $stokProduk->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stokProduk.fields.nama_produk') }}
                        </th>
                        <td>
                            {{ $stokProduk->nama_produk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stokProduk.fields.qty') }}
                        </th>
                        <td>
                            {{ $stokProduk->qty }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stokProduk.fields.fotoproduk') }}
                        </th>
                        <td>
                            @if($stokProduk->fotoproduk)
                                <a href="{{ $stokProduk->fotoproduk->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $stokProduk->fotoproduk->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stokProduk.fields.sku') }}
                        </th>
                        <td>
                            {{ $stokProduk->sku }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stokProduk.fields.biaya_produksi') }}
                        </th>
                        <td>
                            {{ $stokProduk->biaya_produksi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stokProduk.fields.harga_jual') }}
                        </th>
                        <td>
                            {{ $stokProduk->harga_jual }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stokProduk.fields.kategori') }}
                        </th>
                        <td>
                            {{ App\Models\StokProduk::KATEGORI_RADIO[$stokProduk->kategori] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stok-produks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection