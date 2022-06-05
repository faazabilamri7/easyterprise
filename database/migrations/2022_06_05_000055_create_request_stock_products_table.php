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
            $table->date('tanggal_request')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
