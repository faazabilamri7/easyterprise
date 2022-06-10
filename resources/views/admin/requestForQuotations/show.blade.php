@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.requestForQuotation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.request-for-quotations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.requestForQuotation.fields.id') }}
                        </th>
                        <td>
                            {{ $requestForQuotation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestForQuotation.fields.id_request_for_quotation') }}
                        </th>
                        <td>
                            {{ $requestForQuotation->id_request_for_quotation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestForQuotation.fields.id_purchase_requisition') }}
                        </th>
                        <td>
                            {{ $requestForQuotation->id_purchase_requisition->id_purchase_requition ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestForQuotation.fields.description') }}
                        </th>
                        <td>
                            {{ $requestForQuotation->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestForQuotation.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\RequestForQuotation::STATUS_SELECT[$requestForQuotation->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.request-for-quotations.index') }}">
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
            <a class="nav-link" href="#id_request_for_quotation_purchase_inqs" role="tab" data-toggle="tab">
                {{ trans('cruds.purchaseInq.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="id_request_for_quotation_purchase_inqs">
            @includeIf('admin.requestForQuotations.relationships.idRequestForQuotationPurchaseInqs', ['purchaseInqs' => $requestForQuotation->idRequestForQuotationPurchaseInqs])
        </div>
    </div>
</div>

@endsection