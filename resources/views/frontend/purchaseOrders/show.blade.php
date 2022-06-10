@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.purchaseOrder.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.purchase-orders.index') }}">
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
                                        {{ $purchaseOrder->material_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.purchaseOrder.fields.quantity') }}
                                    </th>
                                    <td>
                                        {{ $purchaseOrder->quantity }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.purchase-orders.index') }}">
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