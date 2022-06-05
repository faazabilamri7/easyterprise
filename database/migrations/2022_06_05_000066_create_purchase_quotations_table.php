<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseQuotationsTable extends Migration
{
    public function up()
    {
        Schema::create('purchase_quotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('material_name')->nullable();
            $table->decimal('unit_price', 15, 2)->nullable();
            $table->decimal('total_price', 15, 2)->nullable();
            $table->string('payment_method')->nullable();
            $table->string('status')->nullable();
            $table->string('nego_purchase_quotation')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
