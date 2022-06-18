<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengirimenTable extends Migration
{
    public function up()
    {
        Schema::create('pengirimen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_pengiriman');
            $table->string('status_pengiriman')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
