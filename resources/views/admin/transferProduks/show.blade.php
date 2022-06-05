@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.transferProduk.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transfer-produks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.transferProduk.fields.id') }}
                        </th>
                        <td>
                            {{ $transferProduk->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transferProduk.fields.nama_produk') }}
                        </th>
                        <td>
                            {{ $transferProduk->nama_produk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transferProduk.fields.transfer_dari') }}
                        </th>
                        <td>
                            {{ App\Models\TransferProduk::TRANSFER_DARI_SELECT[$transferProduk->transfer_dari] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transferProduk.fields.transfer_ke') }}
                        </th>
                        <td>
                            {{ App\Models\TransferProduk::TRANSFER_KE_SELECT[$transferProduk->transfer_ke] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transfer-produks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection