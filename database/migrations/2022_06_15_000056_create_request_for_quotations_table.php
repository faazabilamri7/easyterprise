<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestForQuotationsTable extends Migration
{
    public function up()
    {
        Schema::create('request_for_quotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_request_for_quotation');
            $table->string('material_name')->nullable();
            $table->integer('qty')->nullable();
            $table->decimal('unit_price', 15, 2)->nullable();
            $table->decimal('total_price', 15, 2)->nullable();
            $table->longText('description')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
