@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.salesInquiry.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.sales-inquiries.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salesInquiry.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $salesInquiry->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salesInquiry.fields.inquiry_kode') }}
                                    </th>
                                    <td>
                                        {{ $salesInquiry->inquiry_kode }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salesInquiry.fields.tgl_inquiry') }}
                                    </th>
                                    <td>
                                        {{ $salesInquiry->tgl_inquiry }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salesInquiry.fields.id_customer') }}
                                    </th>
                                    <td>
                                        {{ $salesInquiry->id_customer->first_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salesInquiry.fields.nama_produk') }}
                                    </th>
                                    <td>
                                        {{ $salesInquiry->nama_produk->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salesInquiry.fields.qty') }}
                                    </th>
                                    <td>
                                        {{ $salesInquiry->qty }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salesInquiry.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\SalesInquiry::STATUS_SELECT[$salesInquiry->status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.salesInquiry.fields.catatan') }}
                                    </th>
                                    <td>
                                        {{ $salesInquiry->catatan }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.sales-inquiries.index') }}">
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