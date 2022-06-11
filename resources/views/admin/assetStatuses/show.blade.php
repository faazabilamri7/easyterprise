@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.assetStatus.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.asset-statuses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.assetStatus.fields.id') }}
                        </th>
                        <td>
                            {{ $assetStatus->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetStatus.fields.name') }}
                        </th>
                        <td>
                            {{ $assetStatus->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.asset-statuses.index') }}">
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
            <a class="nav-link" href="#status_assets" role="tab" data-toggle="tab">
                {{ trans('cruds.asset.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#status_assets_histories" role="tab" data-toggle="tab">
                {{ trans('cruds.assetsHistory.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="status_assets">
            @includeIf('admin.assetStatuses.relationships.statusAssets', ['assets' => $assetStatus->statusAssets])
        </div>
        <div class="tab-pane" role="tabpanel" id="status_assets_histories">
            @includeIf('admin.assetStatuses.relationships.statusAssetsHistories', ['assetsHistories' => $assetStatus->statusAssetsHistories])
        </div>
    </div>
</div>

@endsection