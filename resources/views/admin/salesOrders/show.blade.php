@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.salesOrder.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sales-orders.index') }}">
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
                            {{ trans('cruds.salesOrder.fields.id_sales_quotation') }}
                        </th>
                        <td>
                            {{ $salesOrder->id_sales_quotation->id_sales_quotation ?? '' }}
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
                <a class="btn btn-default" href="{{ route('admin.sales-orders.index') }}">
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
            <a class="nav-link" href="#no_sales_order_pengirimen" role="tab" data-toggle="tab">
                {{ trans('cruds.pengiriman.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="no_sales_order_pengirimen">
            @includeIf('admin.salesOrders.relationships.noSalesOrderPengirimen', ['pengirimen' => $salesOrder->noSalesOrderPengirimen])
        </div>
    </div>
</div>

@endsection