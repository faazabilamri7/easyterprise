@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.bukuBesar.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.buku-besars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bukuBesar.fields.id') }}
                        </th>
                        <td>
                            {{ $bukuBesar->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bukuBesar.fields.tanggal') }}
                        </th>
                        <td>
                            {{ $bukuBesar->tanggal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bukuBesar.fields.akun') }}
                        </th>
                        <td>
                            {{ $bukuBesar->akun->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bukuBesar.fields.keterangan') }}
                        </th>
                        <td>
                            {{ $bukuBesar->keterangan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bukuBesar.fields.debit') }}
                        </th>
                        <td>
                            {{ $bukuBesar->debit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bukuBesar.fields.kredit') }}
                        </th>
                        <td>
                            {{ $bukuBesar->kredit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bukuBesar.fields.total_debit') }}
                        </th>
                        <td>
                            {{ $bukuBesar->total_debit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bukuBesar.fields.total_kredit') }}
                        </th>
                        <td>
                            {{ $bukuBesar->total_kredit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bukuBesar.fields.status') }}
                        </th>
                        <td>
                            {{ $bukuBesar->status }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.buku-besars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection