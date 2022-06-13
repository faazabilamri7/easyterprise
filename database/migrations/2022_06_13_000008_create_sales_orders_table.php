<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_sales_order');
            $table->date('tanggal');
            $table->string('detail_order')->nullable();
            $table->string('status')->nullable();
            $table->boolean('finance')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
