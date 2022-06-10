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
                                        {{ trans('cruds.listOfMaterial.fields.id_list_of_material') }}
                                    </th>
                                    <td>
                                        {{ $listOfMaterial->id_list_of_material }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMaterial.fields.id_production_plan') }}
                                    </th>
                                    <td>
                                        {{ $listOfMaterial->id_production_plan->id_production_plan ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMaterial.fields.request_air') }}
                                    </th>
                                    <td>
                                        {{ $listOfMaterial->request_air }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMaterial.fields.request_sukrosa') }}
                                    </th>
                                    <td>
                                        {{ $listOfMaterial->request_sukrosa }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMaterial.fields.request_dektrose') }}
                                    </th>
                                    <td>
                                        {{ $listOfMaterial->request_dektrose }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMaterial.fields.request_perisa_yakult') }}
                                    </th>
                                    <td>
                                        {{ $listOfMaterial->request_perisa_yakult }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMaterial.fields.request_susu_bubuk_krim') }}
                                    </th>
                                    <td>
                                        {{ $listOfMaterial->request_susu_bubuk_krim }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listOfMaterial.fields.request_polietilena_tereftalat') }}
                                    </th>
                                    <td>
                                        {{ $listOfMaterial->request_polietilena_tereftalat }}
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