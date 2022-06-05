<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferMaterialsTable extends Migration
{
    public function up()
    {
        Schema::create('transfer_materials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal_transaksi')->nullable();
            $table->string('transfer_dari')->nullable();
            $table->string('transfer_ke')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
