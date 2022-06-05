<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTransaksiKeuangansTable extends Migration
{
    public function up()
    {
        Schema::table('transaksi_keuangans', function (Blueprint $table) {
            $table->unsignedBigInteger('kas_bank_id')->nullable();
            $table->foreign('kas_bank_id', 'kas_bank_fk_6651202')->references('id')->on('kas_banks');
            $table->unsignedBigInteger('produk_id')->nullable();
            $table->foreign('produk_id', 'produk_fk_6651207')->references('id')->on('stok_produks');
        });
    }
}
