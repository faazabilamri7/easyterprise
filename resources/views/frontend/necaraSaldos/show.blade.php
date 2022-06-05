@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.necaraSaldo.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.necara-saldos.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.necaraSaldo.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $necaraSaldo->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.necaraSaldo.fields.tanggal') }}
                                    </th>
                                    <td>
                                        {{ $necaraSaldo->tanggal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.necaraSaldo.fields.akun') }}
                                    </th>
                                    <td>
                                        {{ $necaraSaldo->akun->nama ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.necaraSaldo.fields.debit') }}
                                    </th>
                                    <td>
                                        {{ $necaraSaldo->debit }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.necaraSaldo.fields.kredit') }}
                                    </th>
                                    <td>
                                        {{ $necaraSaldo->kredit }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.necaraSaldo.fields.total_debit') }}
                                    </th>
                                    <td>
                                        {{ $necaraSaldo->total_debit }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.necaraSaldo.fields.total_kredit') }}
                                    </th>
                                    <td>
                                        {{ $necaraSaldo->total_kredit }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.necaraSaldo.fields.total') }}
                                    </th>
                                    <td>
                                        {{ $necaraSaldo->total }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.necaraSaldo.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $necaraSaldo->status }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.necara-saldos.index') }}">
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