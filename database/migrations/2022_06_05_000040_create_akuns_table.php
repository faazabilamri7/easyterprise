<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkunsTable extends Migration
{
    public function up()
    {
        Schema::create('akuns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama')->nullable();
            $table->string('jenis_akun')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
