@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.materialEntry.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.material-entries.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materialEntry.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $materialEntry->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materialEntry.fields.id_material_entry') }}
                                    </th>
                                    <td>
                                        {{ $materialEntry->id_material_entry }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materialEntry.fields.id_purchase_order') }}
                                    </th>
                                    <td>
                                        {{ $materialEntry->id_purchase_order->id_purchase_order ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materialEntry.fields.date_material_entry') }}
                                    </th>
                                    <td>
                                        {{ $materialEntry->date_material_entry }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materialEntry.fields.material_name') }}
                                    </th>
                                    <td>
                                        {{ $materialEntry->material_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materialEntry.fields.qty') }}
                                    </th>
                                    <td>
                                        {{ $materialEntry->qty }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.materialEntry.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\MaterialEntry::STATUS_SELECT[$materialEntry->status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.material-entries.index') }}">
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