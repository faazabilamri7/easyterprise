@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.jurnalPenyelesaian.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.jurnal-penyelesaians.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jurnalPenyelesaian.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $jurnalPenyelesaian->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jurnalPenyelesaian.fields.akun') }}
                                    </th>
                                    <td>
                                        {{ $jurnalPenyelesaian->akun->nama ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jurnalPenyelesaian.fields.keterangan') }}
                                    </th>
                                    <td>
                                        {{ $jurnalPenyelesaian->keterangan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jurnalPenyelesaian.fields.debit') }}
                                    </th>
                                    <td>
                                        {{ $jurnalPenyelesaian->debit }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jurnalPenyelesaian.fields.kredit') }}
                                    </th>
                                    <td>
                                        {{ $jurnalPenyelesaian->kredit }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jurnalPenyelesaian.fields.total_debit') }}
                                    </th>
                                    <td>
                                        {{ $jurnalPenyelesaian->total_debit }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jurnalPenyelesaian.fields.total_kredit') }}
                                    </th>
                                    <td>
                                        {{ $jurnalPenyelesaian->total_kredit }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.jurnalPenyelesaian.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $jurnalPenyelesaian->status }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.jurnal-penyelesaians.index') }}">
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