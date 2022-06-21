@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.purchaseInvoice.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchase-invoices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseInvoice.fields.id') }}
                        </th>
                        <td>
                            {{ $purchaseInvoice->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseInvoice.fields.no_purchase_invoice') }}
                        </th>
                        <td>
                            {{ $purchaseInvoice->no_purchase_invoice }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseInvoice.fields.tanggal') }}
                        </th>
                        <td>
                            {{ $purchaseInvoice->tanggal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseInvoice.fields.purchase_order') }}
                        </th>
                        <td>
                            {{ $purchaseInvoice->purchase_order->date_purchase_order ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseInvoice.fields.total') }}
                        </th>
                        <td>
                            {{ $purchaseInvoice->total }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseInvoice.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\PurchaseInvoice::STATUS_RADIO[$purchaseInvoice->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchase-invoices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection