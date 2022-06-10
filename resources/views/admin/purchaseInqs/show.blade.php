@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.purchaseInq.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchase-inqs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseInq.fields.id') }}
                        </th>
                        <td>
                            {{ $purchaseInq->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseInq.fields.id_purchase_inquiry') }}
                        </th>
                        <td>
                            {{ $purchaseInq->id_purchase_inquiry }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseInq.fields.id_request_for_quotation') }}
                        </th>
                        <td>
                            {{ $purchaseInq->id_request_for_quotation->id_request_for_quotation ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseInq.fields.vendor_name') }}
                        </th>
                        <td>
                            {{ $purchaseInq->vendor_name->nama_vendor ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseInq.fields.date_puchase_inquiry') }}
                        </th>
                        <td>
                            {{ $purchaseInq->date_puchase_inquiry }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseInq.fields.name_material') }}
                        </th>
                        <td>
                            {{ $purchaseInq->name_material->name_material ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseInq.fields.qty') }}
                        </th>
                        <td>
                            {{ $purchaseInq->qty }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchase-inqs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection