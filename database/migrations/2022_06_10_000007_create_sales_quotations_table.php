<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesQuotationsTable extends Migration
{
    public function up()
    {
        Schema::create('sales_quotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('harga', 15, 2)->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
