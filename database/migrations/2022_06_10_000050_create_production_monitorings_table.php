<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionMonitoringsTable extends Migration
{
    public function up()
    {
        Schema::create('production_monitorings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_production_monitoring')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
