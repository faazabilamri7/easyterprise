@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.customerComplain.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customer-complains.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.customerComplain.fields.id') }}
                        </th>
                        <td>
                            {{ $customerComplain->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerComplain.fields.id_customer') }}
                        </th>
                        <td>
                            {{ $customerComplain->id_customer->first_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerComplain.fields.keluhan') }}
                        </th>
                        <td>
                            {{ $customerComplain->keluhan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerComplain.fields.kritik') }}
                        </th>
                        <td>
                            {{ $customerComplain->kritik }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerComplain.fields.saran') }}
                        </th>
                        <td>
                            {{ $customerComplain->saran }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customer-complains.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection