@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.jurnalUmum.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.jurnal-umums.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jurnalUmum.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $jurnalUmum->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jurnalUmum.fields.akun') }}
                                    </th>
                                    <td>
                                        {{ $jurnalUmum->akun->nama ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jurnalUmum.fields.tanggal') }}
                                    </th>
                                    <td>
                                        {{ $jurnalUmum->tanggal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jurnalUmum.fields.nama') }}
                                    </th>
                                    <td>
                                        {{ $jurnalUmum->nama }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jurnalUmum.fields.debit') }}
                                    </th>
                                    <td>
                                        {{ $jurnalUmum->debit }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jurnalUmum.fields.kredit') }}
                                    </th>
                                    <td>
                                        {{ $jurnalUmum->kredit }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jurnalUmum.fields.total_debit') }}
                                    </th>
                                    <td>
                                        {{ $jurnalUmum->total_debit }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jurnalUmum.fields.total_kredit') }}
                                    </th>
                                    <td>
                                        {{ $jurnalUmum->total_kredit }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jurnalUmum.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $jurnalUmum->status }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.jurnal-umums.index') }}">
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