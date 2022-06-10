@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.salesInquiry.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sales-inquiries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.salesInquiry.fields.id') }}
                        </th>
                        <td>
                            {{ $salesInquiry->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salesInquiry.fields.inquiry_kode') }}
                        </th>
                        <td>
                            {{ $salesInquiry->inquiry_kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salesInquiry.fields.tgl_inquiry') }}
                        </th>
                        <td>
                            {{ $salesInquiry->tgl_inquiry }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salesInquiry.fields.id_customer') }}
                        </th>
                        <td>
                            {{ $salesInquiry->id_customer->first_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salesInquiry.fields.nama_produk') }}
                        </th>
                        <td>
                            {{ $salesInquiry->nama_produk->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salesInquiry.fields.qty') }}
                        </th>
                        <td>
                            {{ $salesInquiry->qty }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salesInquiry.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\SalesInquiry::STATUS_SELECT[$salesInquiry->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salesInquiry.fields.catatan') }}
                        </th>
                        <td>
                            {{ $salesInquiry->catatan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sales-inquiries.index') }}">
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
            <a class="nav-link" href="#inquiry_request_stock_products" role="tab" data-toggle="tab">
                {{ trans('cruds.requestStockProduct.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#kode_inquiry_sales_quotations" role="tab" data-toggle="tab">
                {{ trans('cruds.salesQuotation.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="inquiry_request_stock_products">
            @includeIf('admin.salesInquiries.relationships.inquiryRequestStockProducts', ['requestStockProducts' => $salesInquiry->inquiryRequestStockProducts])
        </div>
        <div class="tab-pane" role="tabpanel" id="kode_inquiry_sales_quotations">
            @includeIf('admin.salesInquiries.relationships.kodeInquirySalesQuotations', ['salesQuotations' => $salesInquiry->kodeInquirySalesQuotations])
        </div>
    </div>
</div>

@endsection