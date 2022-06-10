@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.product.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.products.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.id') }}
                        </th>
                        <td>
                            {{ $product->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.name') }}
                        </th>
                        <td>
                            {{ $product->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.foto_produk') }}
                        </th>
                        <td>
                            @if($product->foto_produk)
                                <a href="{{ $product->foto_produk->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $product->foto_produk->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.description') }}
                        </th>
                        <td>
                            {{ $product->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.category') }}
                        </th>
                        <td>
                            @foreach($product->categories as $key => $category)
                                <span class="label label-info">{{ $category->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.tag') }}
                        </th>
                        <td>
                            {{ App\Models\Product::TAG_RADIO[$product->tag] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.stok') }}
                        </th>
                        <td>
                            {{ $product->stok }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.product.fields.harga_jual') }}
                        </th>
                        <td>
                            {{ $product->harga_jual }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.products.index') }}">
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
            <a class="nav-link" href="#nama_produk_sales_inquiries" role="tab" data-toggle="tab">
                {{ trans('cruds.salesInquiry.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#request_product_request_stock_products" role="tab" data-toggle="tab">
                {{ trans('cruds.requestStockProduct.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#product_name_transfer_produks" role="tab" data-toggle="tab">
                {{ trans('cruds.transferProduk.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="nama_produk_sales_inquiries">
            @includeIf('admin.products.relationships.namaProdukSalesInquiries', ['salesInquiries' => $product->namaProdukSalesInquiries])
        </div>
        <div class="tab-pane" role="tabpanel" id="request_product_request_stock_products">
            @includeIf('admin.products.relationships.requestProductRequestStockProducts', ['requestStockProducts' => $product->requestProductRequestStockProducts])
        </div>
        <div class="tab-pane" role="tabpanel" id="product_name_transfer_produks">
            @includeIf('admin.products.relationships.productNameTransferProduks', ['transferProduks' => $product->productNameTransferProduks])
        </div>
    </div>
</div>

@endsection