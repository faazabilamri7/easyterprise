@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.salesOrder.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.sales-orders.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salesOrder.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $salesOrder->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salesOrder.fields.no_sales_order') }}
                                    </th>
                                    <td>
                                        {{ $salesOrder->no_sales_order }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salesOrder.fields.tanggal') }}
                                    </th>
                                    <td>
                                        {{ $salesOrder->tanggal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salesOrder.fields.sales_quotation') }}
                                    </th>
                                    <td>
                                        {{ $salesOrder->sales_quotation->harga ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salesOrder.fields.detail_order') }}
                                    </th>
                                    <td>
                                        {{ $salesOrder->detail_order }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salesOrder.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\SalesOrder::STATUS_SELECT[$salesOrder->status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.sales-orders.index') }}">
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