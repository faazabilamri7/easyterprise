<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferProduksTable extends Migration
{
    public function up()
    {
        Schema::create('transfer_produks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_transfer_produk');
            $table->integer('qty')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
