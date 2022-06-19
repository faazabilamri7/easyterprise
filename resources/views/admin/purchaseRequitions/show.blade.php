@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.purchaseRequition.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchase-requitions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.id') }}
                        </th>
                        <td>
                            {{ $purchaseRequition->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.id_purchase_requition') }}
                        </th>
                        <td>
                            {{ $purchaseRequition->id_purchase_requition }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.id_list_of_material') }}
                        </th>
                        <td>
                            {{ $purchaseRequition->id_list_of_material->id_list_of_material ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.material_1') }}
                        </th>
                        <td>
                            {{ $purchaseRequition->material_1->name_material ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.qty_1') }}
                        </th>
                        <td>
                            {{ $purchaseRequition->qty_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.material_2') }}
                        </th>
                        <td>
                            {{ $purchaseRequition->material_2->name_material ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.qty_2') }}
                        </th>
                        <td>
                            {{ $purchaseRequition->qty_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.material_3') }}
                        </th>
                        <td>
                            {{ $purchaseRequition->material_3->name_material ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.qty_3') }}
                        </th>
                        <td>
                            {{ $purchaseRequition->qty_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.material_4') }}
                        </th>
                        <td>
                            {{ $purchaseRequition->material_4->name_material ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.qty_4') }}
                        </th>
                        <td>
                            {{ $purchaseRequition->qty_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.material_5') }}
                        </th>
                        <td>
                            {{ $purchaseRequition->material_5->name_material ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.qty_5') }}
                        </th>
                        <td>
                            {{ $purchaseRequition->qty_5 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.material_6') }}
                        </th>
                        <td>
                            {{ $purchaseRequition->material_6->name_material ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.qty_6') }}
                        </th>
                        <td>
                            {{ $purchaseRequition->qty_6 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchaseRequition.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\PurchaseRequition::STATUS_SELECT[$purchaseRequition->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchase-requitions.index') }}">
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
            <a class="nav-link" href="#id_purchase_requisition_request_for_quotations" role="tab" data-toggle="tab">
                {{ trans('cruds.requestForQuotation.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="id_purchase_requisition_request_for_quotations">
            @includeIf('admin.purchaseRequitions.relationships.idPurchaseRequisitionRequestForQuotations', ['requestForQuotations' => $purchaseRequition->idPurchaseRequisitionRequestForQuotations])
        </div>
    </div>
</div>

@endsection