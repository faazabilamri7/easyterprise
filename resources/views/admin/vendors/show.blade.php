@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.vendor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vendors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.id') }}
                        </th>
                        <td>
                            {{ $vendor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.nama_vendor') }}
                        </th>
                        <td>
                            {{ $vendor->nama_vendor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.telepon') }}
                        </th>
                        <td>
                            {{ $vendor->telepon }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.email') }}
                        </th>
                        <td>
                            {{ $vendor->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.alamat') }}
                        </th>
                        <td>
                            {{ $vendor->alamat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vendor.fields.website') }}
                        </th>
                        <td>
                            {{ $vendor->website }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vendors.index') }}">
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
            <a class="nav-link" href="#vendor_documents_vendors" role="tab" data-toggle="tab">
                {{ trans('cruds.documentsVendor.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#vendor_notes_vendors" role="tab" data-toggle="tab">
                {{ trans('cruds.notesVendor.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#id_vendor_purchase_quotations" role="tab" data-toggle="tab">
                {{ trans('cruds.purchaseQuotation.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#vendor_name_purchase_inqs" role="tab" data-toggle="tab">
                {{ trans('cruds.purchaseInq.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="vendor_documents_vendors">
            @includeIf('admin.vendors.relationships.vendorDocumentsVendors', ['documentsVendors' => $vendor->vendorDocumentsVendors])
        </div>
        <div class="tab-pane" role="tabpanel" id="vendor_notes_vendors">
            @includeIf('admin.vendors.relationships.vendorNotesVendors', ['notesVendors' => $vendor->vendorNotesVendors])
        </div>
        <div class="tab-pane" role="tabpanel" id="id_vendor_purchase_quotations">
            @includeIf('admin.vendors.relationships.idVendorPurchaseQuotations', ['purchaseQuotations' => $vendor->idVendorPurchaseQuotations])
        </div>
        <div class="tab-pane" role="tabpanel" id="vendor_name_purchase_inqs">
            @includeIf('admin.vendors.relationships.vendorNamePurchaseInqs', ['purchaseInqs' => $vendor->vendorNamePurchaseInqs])
        </div>
    </div>
</div>

@endsection