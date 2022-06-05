@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.kasBank.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kas-banks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.kasBank.fields.id') }}
                        </th>
                        <td>
                            {{ $kasBank->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kasBank.fields.tanggal') }}
                        </th>
                        <td>
                            {{ $kasBank->tanggal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kasBank.fields.reff') }}
                        </th>
                        <td>
                            {{ $kasBank->reff }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kasBank.fields.transaksi') }}
                        </th>
                        <td>
                            {{ $kasBank->transaksi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kasBank.fields.jumlah') }}
                        </th>
                        <td>
                            {{ $kasBank->jumlah }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kas-banks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection