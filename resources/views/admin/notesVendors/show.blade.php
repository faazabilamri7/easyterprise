@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.notesVendor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.notes-vendors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.notesVendor.fields.id') }}
                        </th>
                        <td>
                            {{ $notesVendor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notesVendor.fields.vendor') }}
                        </th>
                        <td>
                            {{ $notesVendor->vendor->nama_vendor ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.notesVendor.fields.note') }}
                        </th>
                        <td>
                            {{ $notesVendor->note }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.notes-vendors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection