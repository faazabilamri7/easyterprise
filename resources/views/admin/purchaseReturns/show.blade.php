@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.purchaseReturn.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchase-returns.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseReturn.fields.id') }}
                        </th>
                        <td>
                            {{ $purchaseReturn->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseReturn.fields.id_purchase_return') }}
                        </th>
                        <td>
                            {{ $purchaseReturn->id_purchase_return }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseReturn.fields.id_purchase_order') }}
                        </th>
                        <td>
                            {{ $purchaseReturn->id_purchase_order->id_purchase_order ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseReturn.fields.date_purchase_return') }}
                        </th>
                        <td>
                            {{ $purchaseReturn->date_purchase_return }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseReturn.fields.material_name') }}
                        </th>
                        <td>
                            {{ $purchaseReturn->material_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseReturn.fields.qty') }}
                        </th>
                        <td>
                            {{ $purchaseReturn->qty }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseReturn.fields.description') }}
                        </th>
                        <td>
                            {{ $purchaseReturn->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseReturn.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\PurchaseReturn::STATUS_SELECT[$purchaseReturn->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchase-returns.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection