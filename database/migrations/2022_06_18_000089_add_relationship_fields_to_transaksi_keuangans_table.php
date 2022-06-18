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
            $table->unsignedBigInteger('sales_product_id')->nullable();
            $table->foreign('sales_product_id', 'sales_product_fk_6734289')->references('id')->on('sales_orders');
        });
    }
}
