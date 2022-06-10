<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseRequitionsTable extends Migration
{
    public function up()
    {
        Schema::create('purchase_requitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_purchase_requition')->nullable();
            $table->string('status')->nullable();
            $table->integer('qty_1')->nullable();
            $table->integer('qty_2')->nullable();
            $table->integer('qty_3')->nullable();
            $table->integer('qty_4')->nullable();
            $table->integer('qty_5')->nullable();
            $table->integer('qty_6')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
