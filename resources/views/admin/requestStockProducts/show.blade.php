@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.requestStockProduct.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.request-stock-products.index') }}">
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
                            {{ trans('cruds.requestStockProduct.fields.id_request_product') }}
                        </th>
                        <td>
                            {{ $requestStockProduct->id_request_product }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestStockProduct.fields.inquiry') }}
                        </th>
                        <td>
                            {{ $requestStockProduct->inquiry->inquiry_kode ?? '' }}
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
                            {{ trans('cruds.requestStockProduct.fields.request_product') }}
                        </th>
                        <td>
                            {{ $requestStockProduct->request_product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestStockProduct.fields.qty') }}
                        </th>
                        <td>
                            {{ $requestStockProduct->qty }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestStockProduct.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\RequestStockProduct::STATUS_SELECT[$requestStockProduct->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.request-stock-products.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#id_request_product_tasks" role="tab" data-toggle="tab">
                {{ trans('cruds.task.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="id_request_product_tasks">
            @includeIf('admin.requestStockProducts.relationships.idRequestProductTasks', ['tasks' => $requestStockProduct->idRequestProductTasks])
        </div>
    </div>
</div>

@endsection