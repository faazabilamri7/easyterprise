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
            $table->longText('description')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
