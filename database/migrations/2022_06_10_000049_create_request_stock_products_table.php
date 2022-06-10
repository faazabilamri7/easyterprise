<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestStockProductsTable extends Migration
{
    public function up()
    {
        Schema::create('request_stock_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_request_product')->nullable();
            $table->date('tanggal_request')->nullable();
            $table->integer('qty')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
