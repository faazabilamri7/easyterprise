<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiKeuangansTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi_keuangans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal')->nullable();
            $table->string('desc')->nullable();
            $table->decimal('nominal', 15, 2)->nullable();
            $table->string('jenis_pembayaran')->nullable();
            $table->integer('qty')->nullable();
            $table->decimal('harga_unit', 15, 2)->nullable();
            $table->decimal('total', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
