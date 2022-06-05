@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.purchaseInq.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.purchase-inqs.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.purchaseInq.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $purchaseInq->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.purchaseInq.fields.id_request_for_quotation') }}
                                    </th>
                                    <td>
                                        {{ $purchaseInq->id_request_for_quotation->id_purchase_requisition ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.purchaseInq.fields.date_purchase_inquiry') }}
                                    </th>
                                    <td>
                                        {{ $purchaseInq->date_purchase_inquiry }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.purchaseInq.fields.material_name') }}
                                    </th>
                                    <td>
                                        {{ $purchaseInq->material_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.purchaseInq.fields.quantity') }}
                                    </th>
                                    <td>
                                        {{ $purchaseInq->quantity }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.purchase-inqs.index') }}">
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