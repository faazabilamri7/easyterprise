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
                            {{ trans('cruds.purchaseInq.fields.material_name') }}
                        </th>
                        <td>
                            {{ $purchaseInq->material_name->name_material ?? '' }}
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

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#id_purchase_inquiry_purchase_quotations" role="tab" data-toggle="tab">
                {{ trans('cruds.purchaseQuotation.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="id_purchase_inquiry_purchase_quotations">
            @includeIf('admin.purchaseInqs.relationships.idPurchaseInquiryPurchaseQuotations', ['purchaseQuotations' => $purchaseInq->idPurchaseInquiryPurchaseQuotations])
        </div>
    </div>
</div>

@endsection