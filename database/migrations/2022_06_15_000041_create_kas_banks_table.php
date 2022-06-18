<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasBanksTable extends Migration
{
    public function up()
    {
        Schema::create('kas_banks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal')->nullable();
            $table->string('reff')->nullable();
            $table->decimal('transaksi', 15, 2)->nullable();
            $table->integer('jumlah')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
