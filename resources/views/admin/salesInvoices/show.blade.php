@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.salesInvoice.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sales-invoices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.salesInvoice.fields.id') }}
                        </th>
                        <td>
                            {{ $salesInvoice->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salesInvoice.fields.no_sales_invoice') }}
                        </th>
                        <td>
                            {{ $salesInvoice->no_sales_invoice }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salesInvoice.fields.sales_invoice') }}
                        </th>
                        <td>
                            @if($salesInvoice->sales_invoice)
                                <a href="{{ $salesInvoice->sales_invoice->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salesInvoice.fields.sales_order') }}
                        </th>
                        <td>
                            {{ $salesInvoice->sales_order->no_sales_order ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salesInvoice.fields.jatuh_tempo') }}
                        </th>
                        <td>
                            {{ $salesInvoice->jatuh_tempo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salesInvoice.fields.bukti_pembayaran') }}
                        </th>
                        <td>
                            @if($salesInvoice->bukti_pembayaran)
                                <a href="{{ $salesInvoice->bukti_pembayaran->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $salesInvoice->bukti_pembayaran->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salesInvoice.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\SalesInvoice::STATUS_RADIO[$salesInvoice->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sales-invoices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection