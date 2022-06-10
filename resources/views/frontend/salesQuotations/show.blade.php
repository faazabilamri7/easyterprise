@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.salesQuotation.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.sales-quotations.index') }}">
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
                            <a class="btn btn-default" href="{{ route('frontend.sales-quotations.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection