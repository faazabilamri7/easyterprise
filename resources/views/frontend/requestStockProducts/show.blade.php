@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.requestStockProduct.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.request-stock-products.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.requestStockProduct.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $requestStockProduct->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.requestStockProduct.fields.tanggal_request') }}
                                    </th>
                                    <td>
                                        {{ $requestStockProduct->tanggal_request }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.requestStockProduct.fields.inquiry') }}
                                    </th>
                                    <td>
                                        {{ $requestStockProduct->inquiry->inquiry ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.request-stock-products.index') }}">
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