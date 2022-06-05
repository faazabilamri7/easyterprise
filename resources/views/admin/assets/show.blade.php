@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.asset.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.assets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.asset.fields.id') }}
                        </th>
                        <td>
                            {{ $asset->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asset.fields.category') }}
                        </th>
                        <td>
                            {{ $asset->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asset.fields.serial_number') }}
                        </th>
                        <td>
                            {{ $asset->serial_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asset.fields.name') }}
                        </th>
                        <td>
                            {{ $asset->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asset.fields.photos') }}
                        </th>
                        <td>
                            @foreach($asset->photos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asset.fields.status') }}
                        </th>
                        <td>
                            {{ $asset->status->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asset.fields.location') }}
                        </th>
                        <td>
                            {{ $asset->location->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asset.fields.notes') }}
                        </th>
                        <td>
                            {{ $asset->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asset.fields.assigned_to') }}
                        </th>
                        <td>
                            {{ $asset->assigned_to->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.assets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection