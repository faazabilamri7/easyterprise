@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.material.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.materials.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.material.fields.id') }}
                        </th>
                        <td>
                            {{ $material->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.material.fields.name_material') }}
                        </th>
                        <td>
                            {{ $material->name_material }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.material.fields.descriptive') }}
                        </th>
                        <td>
                            {{ $material->descriptive }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.material.fields.photo') }}
                        </th>
                        <td>
                            @foreach($material->photo as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.material.fields.stock') }}
                        </th>
                        <td>
                            {{ $material->stock }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.materials.index') }}">
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
            <a class="nav-link" href="#material1_purchase_requitions" role="tab" data-toggle="tab">
                {{ trans('cruds.purchaseRequition.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#material2_purchase_requitions" role="tab" data-toggle="tab">
                {{ trans('cruds.purchaseRequition.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#material3_purchase_requitions" role="tab" data-toggle="tab">
                {{ trans('cruds.purchaseRequition.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#material4_purchase_requitions" role="tab" data-toggle="tab">
                {{ trans('cruds.purchaseRequition.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#material5_purchase_requitions" role="tab" data-toggle="tab">
                {{ trans('cruds.purchaseRequition.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#material6_purchase_requitions" role="tab" data-toggle="tab">
                {{ trans('cruds.purchaseRequition.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#name_material_purchase_inqs" role="tab" data-toggle="tab">
                {{ trans('cruds.purchaseInq.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#material_name_purchase_orders" role="tab" data-toggle="tab">
                {{ trans('cruds.purchaseOrder.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="material1_purchase_requitions">
            @includeIf('admin.materials.relationships.material1PurchaseRequitions', ['purchaseRequitions' => $material->material1PurchaseRequitions])
        </div>
        <div class="tab-pane" role="tabpanel" id="material2_purchase_requitions">
            @includeIf('admin.materials.relationships.material2PurchaseRequitions', ['purchaseRequitions' => $material->material2PurchaseRequitions])
        </div>
        <div class="tab-pane" role="tabpanel" id="material3_purchase_requitions">
            @includeIf('admin.materials.relationships.material3PurchaseRequitions', ['purchaseRequitions' => $material->material3PurchaseRequitions])
        </div>
        <div class="tab-pane" role="tabpanel" id="material4_purchase_requitions">
            @includeIf('admin.materials.relationships.material4PurchaseRequitions', ['purchaseRequitions' => $material->material4PurchaseRequitions])
        </div>
        <div class="tab-pane" role="tabpanel" id="material5_purchase_requitions">
            @includeIf('admin.materials.relationships.material5PurchaseRequitions', ['purchaseRequitions' => $material->material5PurchaseRequitions])
        </div>
        <div class="tab-pane" role="tabpanel" id="material6_purchase_requitions">
            @includeIf('admin.materials.relationships.material6PurchaseRequitions', ['purchaseRequitions' => $material->material6PurchaseRequitions])
        </div>
        <div class="tab-pane" role="tabpanel" id="name_material_purchase_inqs">
            @includeIf('admin.materials.relationships.nameMaterialPurchaseInqs', ['purchaseInqs' => $material->nameMaterialPurchaseInqs])
        </div>
        <div class="tab-pane" role="tabpanel" id="material_name_purchase_orders">
            @includeIf('admin.materials.relationships.materialNamePurchaseOrders', ['purchaseOrders' => $material->materialNamePurchaseOrders])
        </div>
    </div>
</div>

@endsection