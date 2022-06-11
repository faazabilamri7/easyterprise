@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.assetLocation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.asset-locations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.assetLocation.fields.id') }}
                        </th>
                        <td>
                            {{ $assetLocation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assetLocation.fields.name') }}
                        </th>
                        <td>
                            {{ $assetLocation->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.asset-locations.index') }}">
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
            <a class="nav-link" href="#location_assets" role="tab" data-toggle="tab">
                {{ trans('cruds.asset.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#location_assets_histories" role="tab" data-toggle="tab">
                {{ trans('cruds.assetsHistory.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="location_assets">
            @includeIf('admin.assetLocations.relationships.locationAssets', ['assets' => $assetLocation->locationAssets])
        </div>
        <div class="tab-pane" role="tabpanel" id="location_assets_histories">
            @includeIf('admin.assetLocations.relationships.locationAssetsHistories', ['assetsHistories' => $assetLocation->locationAssetsHistories])
        </div>
    </div>
</div>

@endsection