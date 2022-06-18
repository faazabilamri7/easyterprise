@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.purchaseOrder.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchase-orders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.id') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.id_purchase_order') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->id_purchase_order }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.id_purchase_quotation') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->id_purchase_quotation->id_purchase_quotation ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.date_purchase_order') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->date_purchase_order }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.material_name') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->material_name->name_material ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseOrder.fields.qty') }}
                        </th>
                        <td>
                            {{ $purchaseOrder->qty }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchase-orders.index') }}">
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
            <a class="nav-link" href="#id_purchase_order_material_entries" role="tab" data-toggle="tab">
                {{ trans('cruds.materialEntry.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#id_purchase_order_purchase_returns" role="tab" data-toggle="tab">
                {{ trans('cruds.purchaseReturn.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="id_purchase_order_material_entries">
            @includeIf('admin.purchaseOrders.relationships.idPurchaseOrderMaterialEntries', ['materialEntries' => $purchaseOrder->idPurchaseOrderMaterialEntries])
        </div>
        <div class="tab-pane" role="tabpanel" id="id_purchase_order_purchase_returns">
            @includeIf('admin.purchaseOrders.relationships.idPurchaseOrderPurchaseReturns', ['purchaseReturns' => $purchaseOrder->idPurchaseOrderPurchaseReturns])
        </div>
    </div>
</div>

@endsection