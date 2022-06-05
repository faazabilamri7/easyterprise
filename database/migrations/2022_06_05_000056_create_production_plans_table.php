<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionPlansTable extends Migration
{
    public function up()
    {
        Schema::create('production_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tugas');
            $table->date('tanggal_mulai');
            $table->string('durasi');
            $table->string('rincian')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
