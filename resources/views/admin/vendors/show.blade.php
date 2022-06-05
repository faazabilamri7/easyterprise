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
                            {{ trans('cruds.vendor.fields.id_purchase_inquiry') }}
                        </th>
                        <td>
                            {{ $vendor->id_purchase_inquiry->date_purchase_inquiry ?? '' }}
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
            <a class="nav-link" href="#perusahaan_invoice_pembelians" role="tab" data-toggle="tab">
                {{ trans('cruds.invoicePembelian.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="perusahaan_invoice_pembelians">
            @includeIf('admin.vendors.relationships.perusahaanInvoicePembelians', ['invoicePembelians' => $vendor->perusahaanInvoicePembelians])
        </div>
    </div>
</div>

@endsection