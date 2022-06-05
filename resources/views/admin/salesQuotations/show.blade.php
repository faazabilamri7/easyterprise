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
                            {{ trans('cruds.salesQuotation.fields.id_sales_inquiry') }}
                        </th>
                        <td>
                            {{ $salesQuotation->id_sales_inquiry->inquiry ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salesQuotation.fields.id_customer') }}
                        </th>
                        <td>
                            {{ $salesQuotation->id_customer->first_name ?? '' }}
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
                            {{ $salesQuotation->status }}
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



@endsection