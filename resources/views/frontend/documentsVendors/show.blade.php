@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.documentsVendor.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.documents-vendors.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.documentsVendor.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $documentsVendor->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.documentsVendor.fields.vendor') }}
                                    </th>
                                    <td>
                                        {{ $documentsVendor->vendor->nama_vendor ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.documentsVendor.fields.document_file') }}
                                    </th>
                                    <td>
                                        @if($documentsVendor->document_file)
                                            <a href="{{ $documentsVendor->document_file->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.documentsVendor.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $documentsVendor->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.documentsVendor.fields.description') }}
                                    </th>
                                    <td>
                                        {{ $documentsVendor->description }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.documents-vendors.index') }}">
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