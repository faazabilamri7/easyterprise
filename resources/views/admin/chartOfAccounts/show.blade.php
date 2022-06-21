@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.chartOfAccount.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.chart-of-accounts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.chartOfAccount.fields.id') }}
                        </th>
                        <td>
                            {{ $chartOfAccount->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.chartOfAccount.fields.account_code') }}
                        </th>
                        <td>
                            {{ $chartOfAccount->account_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.chartOfAccount.fields.account_name') }}
                        </th>
                        <td>
                            {{ $chartOfAccount->account_name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.chart-of-accounts.index') }}">
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
            @includeIf('admin.chartOfAccounts.relationships.akunJurnalUmums', ['jurnalUmums' => $chartOfAccount->akunJurnalUmums])
        </div>
        <div class="tab-pane" role="tabpanel" id="akun_buku_besars">
            @includeIf('admin.chartOfAccounts.relationships.akunBukuBesars', ['bukuBesars' => $chartOfAccount->akunBukuBesars])
        </div>
        <div class="tab-pane" role="tabpanel" id="akun_necara_saldos">
            @includeIf('admin.chartOfAccounts.relationships.akunNecaraSaldos', ['necaraSaldos' => $chartOfAccount->akunNecaraSaldos])
        </div>
        <div class="tab-pane" role="tabpanel" id="akun_jurnal_penyelesaians">
            @includeIf('admin.chartOfAccounts.relationships.akunJurnalPenyelesaians', ['jurnalPenyelesaians' => $chartOfAccount->akunJurnalPenyelesaians])
        </div>
    </div>
</div>

@endsection