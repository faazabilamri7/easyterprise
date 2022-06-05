<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiayaProduksisTable extends Migration
{
    public function up()
    {
        Schema::create('biaya_produksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal')->nullable();
            $table->string('periode')->nullable();
            $table->string('desc')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
