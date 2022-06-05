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
            $table->integer('qty')->nullable();
            $table->string('status')->nullable();
            $table->string('detail_order')->nullable();
            $table->date('tanggal')->nullable();
            $table->decimal('total', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
