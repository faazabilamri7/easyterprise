@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.assetsHistory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.assets-histories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.assetsHistory.fields.id') }}
                        </th>
                        <td>
                            {{ $assetsHistory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetsHistory.fields.asset') }}
                        </th>
                        <td>
                            {{ $assetsHistory->asset->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetsHistory.fields.status') }}
                        </th>
                        <td>
                            {{ $assetsHistory->status->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetsHistory.fields.location') }}
                        </th>
                        <td>
                            {{ $assetsHistory->location->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetsHistory.fields.assigned_user') }}
                        </th>
                        <td>
                            {{ $assetsHistory->assigned_user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetsHistory.fields.created_at') }}
                        </th>
                        <td>
                            {{ $assetsHistory->created_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.assets-histories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection