@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.purchasReq.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchas-reqs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasReq.fields.id') }}
                        </th>
                        <td>
                            {{ $purchasReq->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasReq.fields.id_list_of_material') }}
                        </th>
                        <td>
                            {{ $purchasReq->id_list_of_material }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasReq.fields.date_purchase_requisition') }}
                        </th>
                        <td>
                            {{ $purchasReq->date_purchase_requisition }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasReq.fields.total_price') }}
                        </th>
                        <td>
                            {{ $purchasReq->total_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.purchasReq.fields.status') }}
                        </th>
                        <td>
                            {{ $purchasReq->status }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.purchas-reqs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection