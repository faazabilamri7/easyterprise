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
            $table->string('nama_produk')->nullable();
            $table->string('transfer_dari')->nullable();
            $table->string('transfer_ke')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
