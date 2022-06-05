<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListOfMaterialsTable extends Migration
{
    public function up()
    {
        Schema::create('list_of_materials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai')->nullable();
            $table->string('pilihan_bahan_baku')->nullable();
            $table->integer('qty');
            $table->integer('harga_satuan');
            $table->string('total');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
