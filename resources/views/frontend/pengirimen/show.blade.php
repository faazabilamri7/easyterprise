@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.pengiriman.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.pengirimen.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pengiriman.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $pengiriman->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pengiriman.fields.nama_customer') }}
                                    </th>
                                    <td>
                                        {{ $pengiriman->nama_customer }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pengiriman.fields.status_pengiriman') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Pengiriman::STATUS_PENGIRIMAN_SELECT[$pengiriman->status_pengiriman] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pengiriman.fields.alamat_pengiriman') }}
                                    </th>
                                    <td>
                                        {{ $pengiriman->alamat_pengiriman }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.pengirimen.index') }}">
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