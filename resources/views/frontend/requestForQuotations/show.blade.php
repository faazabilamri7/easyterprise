@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.requestForQuotation.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.request-for-quotations.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.requestForQuotation.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $requestForQuotation->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.requestForQuotation.fields.id_purchase_requisition') }}
                                    </th>
                                    <td>
                                        {{ $requestForQuotation->id_purchase_requisition }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.requestForQuotation.fields.id_company') }}
                                    </th>
                                    <td>
                                        {{ $requestForQuotation->id_company }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.requestForQuotation.fields.material_name') }}
                                    </th>
                                    <td>
                                        {{ $requestForQuotation->material_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.requestForQuotation.fields.quantity') }}
                                    </th>
                                    <td>
                                        {{ $requestForQuotation->quantity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.requestForQuotation.fields.unit_price') }}
                                    </th>
                                    <td>
                                        {{ $requestForQuotation->unit_price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.requestForQuotation.fields.total_price') }}
                                    </th>
                                    <td>
                                        {{ $requestForQuotation->total_price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.requestForQuotation.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $requestForQuotation->status }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.request-for-quotations.index') }}">
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