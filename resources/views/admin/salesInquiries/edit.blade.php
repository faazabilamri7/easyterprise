@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.salesInquiry.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sales-inquiries.update", [$salesInquiry->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="inquiry_kode">{{ trans('cruds.salesInquiry.fields.inquiry_kode') }}</label>
                <input class="form-control {{ $errors->has('inquiry_kode') ? 'is-invalid' : '' }}" type="text" name="inquiry_kode" id="inquiry_kode" value="{{ old('inquiry_kode', $salesInquiry->inquiry_kode) }}" required>
                @if($errors->has('inquiry_kode'))
                    <span class="text-danger">{{ $errors->first('inquiry_kode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salesInquiry.fields.inquiry_kode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tgl_inquiry">{{ trans('cruds.salesInquiry.fields.tgl_inquiry') }}</label>
                <input class="form-control date {{ $errors->has('tgl_inquiry') ? 'is-invalid' : '' }}" type="text" name="tgl_inquiry" id="tgl_inquiry" value="{{ old('tgl_inquiry', $salesInquiry->tgl_inquiry) }}" required>
                @if($errors->has('tgl_inquiry'))
                    <span class="text-danger">{{ $errors->first('tgl_inquiry') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salesInquiry.fields.tgl_inquiry_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="id_customer_id">{{ trans('cruds.salesInquiry.fields.id_customer') }}</label>
                <select class="form-control select2 {{ $errors->has('id_customer') ? 'is-invalid' : '' }}" name="id_customer_id" id="id_customer_id" required>
                    @foreach($id_customers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('id_customer_id') ? old('id_customer_id') : $salesInquiry->id_customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_customer'))
                    <span class="text-danger">{{ $errors->first('id_customer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salesInquiry.fields.id_customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama_produk_id">{{ trans('cruds.salesInquiry.fields.nama_produk') }}</label>
                <select class="form-control select2 {{ $errors->has('nama_produk') ? 'is-invalid' : '' }}" name="nama_produk_id" id="nama_produk_id" required>
                    @foreach($nama_produks as $id => $entry)
                        <option value="{{ $id }}" {{ (old('nama_produk_id') ? old('nama_produk_id') : $salesInquiry->nama_produk->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('nama_produk'))
                    <span class="text-danger">{{ $errors->first('nama_produk') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salesInquiry.fields.nama_produk_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="qty">{{ trans('cruds.salesInquiry.fields.qty') }}</label>
                <input class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}" type="number" name="qty" id="qty" value="{{ old('qty', $salesInquiry->qty) }}" step="1" required>
                @if($errors->has('qty'))
                    <span class="text-danger">{{ $errors->first('qty') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salesInquiry.fields.qty_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.salesInquiry.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\SalesInquiry::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $salesInquiry->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salesInquiry.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="catatan">{{ trans('cruds.salesInquiry.fields.catatan') }}</label>
                <textarea class="form-control {{ $errors->has('catatan') ? 'is-invalid' : '' }}" name="catatan" id="catatan">{{ old('catatan', $salesInquiry->catatan) }}</textarea>
                @if($errors->has('catatan'))
                    <span class="text-danger">{{ $errors->first('catatan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salesInquiry.fields.catatan_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection