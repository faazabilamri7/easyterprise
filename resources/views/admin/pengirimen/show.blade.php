@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pengiriman.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pengirimen.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pengiriman.fields.id') }}
                        </th>
                        <td>
                            {{ $pengiriman->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengiriman.fields.id_pengiriman') }}
                        </th>
                        <td>
                            {{ $pengiriman->id_pengiriman }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengiriman.fields.no_sales_order') }}
                        </th>
                        <td>
                            {{ $pengiriman->no_sales_order->no_sales_order ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengiriman.fields.status_pengiriman') }}
                        </th>
                        <td>
                            {{ App\Models\Pengiriman::STATUS_PENGIRIMAN_SELECT[$pengiriman->status_pengiriman] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pengirimen.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection