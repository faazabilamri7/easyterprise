@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.biayaProduksi.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.biaya-produksis.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.biayaProduksi.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $biayaProduksi->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.biayaProduksi.fields.tanggal') }}
                                    </th>
                                    <td>
                                        {{ $biayaProduksi->tanggal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.biayaProduksi.fields.periode') }}
                                    </th>
                                    <td>
                                        {{ $biayaProduksi->periode }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.biayaProduksi.fields.desc') }}
                                    </th>
                                    <td>
                                        {{ $biayaProduksi->desc }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.biaya-produksis.index') }}">
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