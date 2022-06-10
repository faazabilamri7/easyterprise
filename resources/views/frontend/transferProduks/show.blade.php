@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.transferProduk.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.transfer-produks.index') }}">
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
                                        {{ trans('cruds.transferProduk.fields.id_transfer_produk') }}
                                    </th>
                                    <td>
                                        {{ $transferProduk->id_transfer_produk }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transferProduk.fields.id_quality_control') }}
                                    </th>
                                    <td>
                                        {{ $transferProduk->id_quality_control->id_quality_control ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transferProduk.fields.product_name') }}
                                    </th>
                                    <td>
                                        {{ $transferProduk->product_name->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transferProduk.fields.qty') }}
                                    </th>
                                    <td>
                                        {{ $transferProduk->qty }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transferProduk.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\TransferProduk::STATUS_SELECT[$transferProduk->status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.transfer-produks.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection