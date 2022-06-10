@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.salesQuotation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sales-quotations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.salesQuotation.fields.id') }}
                        </th>
                        <td>
                            {{ $salesQuotation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salesQuotation.fields.id_sales_quotation') }}
                        </th>
                        <td>
                            {{ $salesQuotation->id_sales_quotation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salesQuotation.fields.kode_inquiry') }}
                        </th>
                        <td>
                            {{ $salesQuotation->kode_inquiry->inquiry_kode ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salesQuotation.fields.harga') }}
                        </th>
                        <td>
                            {{ $salesQuotation->harga }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salesQuotation.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\SalesQuotation::STATUS_SELECT[$salesQuotation->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sales-quotations.index') }}">
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
            <a class="nav-link" href="#id_sales_quotation_sales_orders" role="tab" data-toggle="tab">
                {{ trans('cruds.salesOrder.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="id_sales_quotation_sales_orders">
            @includeIf('admin.salesQuotations.relationships.idSalesQuotationSalesOrders', ['salesOrders' => $salesQuotation->idSalesQuotationSalesOrders])
        </div>
    </div>
</div>

@endsection