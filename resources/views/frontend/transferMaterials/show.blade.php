@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.transferMaterial.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.transfer-materials.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transferMaterial.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $transferMaterial->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transferMaterial.fields.tanggal_transaksi') }}
                                    </th>
                                    <td>
                                        {{ $transferMaterial->tanggal_transaksi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transferMaterial.fields.transfer_dari') }}
                                    </th>
                                    <td>
                                        {{ App\Models\TransferMaterial::TRANSFER_DARI_SELECT[$transferMaterial->transfer_dari] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.transferMaterial.fields.transfer_ke') }}
                                    </th>
                                    <td>
                                        {{ App\Models\TransferMaterial::TRANSFER_KE_SELECT[$transferMaterial->transfer_ke] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.transfer-materials.index') }}">
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