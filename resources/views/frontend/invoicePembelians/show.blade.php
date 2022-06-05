@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.invoicePembelian.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.invoice-pembelians.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoicePembelian.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $invoicePembelian->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoicePembelian.fields.nomor') }}
                                    </th>
                                    <td>
                                        {{ $invoicePembelian->nomor }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoicePembelian.fields.tanggal') }}
                                    </th>
                                    <td>
                                        {{ $invoicePembelian->tanggal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoicePembelian.fields.perusahaan') }}
                                    </th>
                                    <td>
                                        {{ $invoicePembelian->perusahaan->nama_vendor ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoicePembelian.fields.customer') }}
                                    </th>
                                    <td>
                                        {{ $invoicePembelian->customer->first_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.invoicePembelian.fields.total') }}
                                    </th>
                                    <td>
                                        {{ $invoicePembelian->total }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.invoice-pembelians.index') }}">
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