@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.material.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.materials.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.material.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $material->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.material.fields.name_material') }}
                                    </th>
                                    <td>
                                        {{ $material->name_material }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.material.fields.price') }}
                                    </th>
                                    <td>
                                        {{ $material->price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.material.fields.descriptive') }}
                                    </th>
                                    <td>
                                        {{ $material->descriptive }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.material.fields.photo') }}
                                    </th>
                                    <td>
                                        @foreach($material->photo as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.materials.index') }}">
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