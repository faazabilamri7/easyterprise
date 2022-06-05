@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.listOfMaterial.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.list-of-materials.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMaterial.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $listOfMaterial->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMaterial.fields.production_plan') }}
                                    </th>
                                    <td>
                                        {{ $listOfMaterial->production_plan->tugas ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMaterial.fields.tanggal_mulai') }}
                                    </th>
                                    <td>
                                        {{ $listOfMaterial->tanggal_mulai }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMaterial.fields.tanggal_selesai') }}
                                    </th>
                                    <td>
                                        {{ $listOfMaterial->tanggal_selesai }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMaterial.fields.pilihan_bahan_baku') }}
                                    </th>
                                    <td>
                                        {{ $listOfMaterial->pilihan_bahan_baku }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMaterial.fields.qty') }}
                                    </th>
                                    <td>
                                        {{ $listOfMaterial->qty }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMaterial.fields.harga_satuan') }}
                                    </th>
                                    <td>
                                        {{ $listOfMaterial->harga_satuan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMaterial.fields.total') }}
                                    </th>
                                    <td>
                                        {{ $listOfMaterial->total }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMaterial.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ListOfMaterial::STATUS_SELECT[$listOfMaterial->status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.list-of-materials.index') }}">
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