<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineReportsTable extends Migration
{
    public function up()
    {
        Schema::create('machine_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_mesin');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
