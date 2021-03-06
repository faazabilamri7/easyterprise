<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_purchase_order');
            $table->date('date_purchase_order')->nullable();
            $table->integer('qty')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
