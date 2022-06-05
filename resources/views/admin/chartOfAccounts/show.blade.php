@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.chartOfAccount.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.chart-of-accounts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.chartOfAccount.fields.id') }}
                        </th>
                        <td>
                            {{ $chartOfAccount->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.chartOfAccount.fields.account_code') }}
                        </th>
                        <td>
                            {{ $chartOfAccount->account_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.chartOfAccount.fields.account_name') }}
                        </th>
                        <td>
                            {{ $chartOfAccount->account_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.chartOfAccount.fields.category') }}
                        </th>
                        <td>
                            {{ App\Models\ChartOfAccount::CATEGORY_SELECT[$chartOfAccount->category] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.chart-of-accounts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection