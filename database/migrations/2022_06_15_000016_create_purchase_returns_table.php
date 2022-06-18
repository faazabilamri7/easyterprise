<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseReturnsTable extends Migration
{
    public function up()
    {
        Schema::create('purchase_returns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_purchase_return')->nullable();
            $table->date('date_purchase_return')->nullable();
            $table->string('material_name')->nullable();
            $table->integer('qty')->nullable();
            $table->longText('description')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
