@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.transferMaterial.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transfer-materials.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.transferMaterial.fields.id') }}
                        </th>
                        <td>
                            {{ $transferMaterial->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transferMaterial.fields.id_transfer_material') }}
                        </th>
                        <td>
                            {{ $transferMaterial->id_transfer_material }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transferMaterial.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\TransferMaterial::STATUS_SELECT[$transferMaterial->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transfer-materials.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection