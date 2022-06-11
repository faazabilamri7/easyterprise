@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.akun.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.akuns.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.akun.fields.id') }}
                        </th>
                        <td>
                            {{ $akun->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.akun.fields.nama') }}
                        </th>
                        <td>
                            {{ $akun->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.akun.fields.jenis_akun') }}
                        </th>
                        <td>
                            {{ $akun->jenis_akun }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.akuns.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#akun_jurnal_umums" role="tab" data-toggle="tab">
                {{ trans('cruds.jurnalUmum.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#akun_buku_besars" role="tab" data-toggle="tab">
                {{ trans('cruds.bukuBesar.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#akun_necara_saldos" role="tab" data-toggle="tab">
                {{ trans('cruds.necaraSaldo.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#akun_jurnal_penyelesaians" role="tab" data-toggle="tab">
                {{ trans('cruds.jurnalPenyelesaian.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="akun_jurnal_umums">
            @includeIf('admin.akuns.relationships.akunJurnalUmums', ['jurnalUmums' => $akun->akunJurnalUmums])
        </div>
        <div class="tab-pane" role="tabpanel" id="akun_buku_besars">
            @includeIf('admin.akuns.relationships.akunBukuBesars', ['bukuBesars' => $akun->akunBukuBesars])
        </div>
        <div class="tab-pane" role="tabpanel" id="akun_necara_saldos">
            @includeIf('admin.akuns.relationships.akunNecaraSaldos', ['necaraSaldos' => $akun->akunNecaraSaldos])
        </div>
        <div class="tab-pane" role="tabpanel" id="akun_jurnal_penyelesaians">
            @includeIf('admin.akuns.relationships.akunJurnalPenyelesaians', ['jurnalPenyelesaians' => $akun->akunJurnalPenyelesaians])
        </div>
    </div>
</div>

@endsection