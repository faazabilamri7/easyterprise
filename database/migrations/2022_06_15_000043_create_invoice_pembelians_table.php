<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicePembeliansTable extends Migration
{
    public function up()
    {
        Schema::create('invoice_pembelians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nomor')->nullable();
            $table->date('tanggal')->nullable();
            $table->decimal('total', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
