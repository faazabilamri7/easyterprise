<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRequestStockProductsTable extends Migration
{
    public function up()
    {
        Schema::table('request_stock_products', function (Blueprint $table) {
            $table->unsignedBigInteger('inquiry_id')->nullable();
            $table->foreign('inquiry_id', 'inquiry_fk_6695786')->references('id')->on('sales_inquiries');
            $table->unsignedBigInteger('request_product_id')->nullable();
            $table->foreign('request_product_id', 'request_product_fk_6734931')->references('id')->on('products');
        });
    }
}
