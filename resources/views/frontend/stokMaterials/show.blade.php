@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.stokMaterial.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.stok-materials.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.stokMaterial.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $stokMaterial->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.stokMaterial.fields.nama_material') }}
                                    </th>
                                    <td>
                                        {{ $stokMaterial->nama_material }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.stokMaterial.fields.qty') }}
                                    </th>
                                    <td>
                                        {{ $stokMaterial->qty }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.stok-materials.index') }}">
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