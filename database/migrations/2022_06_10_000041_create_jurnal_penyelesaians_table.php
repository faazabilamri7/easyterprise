<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalPenyelesaiansTable extends Migration
{
    public function up()
    {
        Schema::create('jurnal_penyelesaians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('keterangan')->nullable();
            $table->decimal('debit', 15, 2)->nullable();
            $table->decimal('kredit', 15, 2)->nullable();
            $table->decimal('total_debit', 15, 2)->nullable();
            $table->decimal('total_kredit', 15, 2)->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
