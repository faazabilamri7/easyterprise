<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualityControlsTable extends Migration
{
    public function up()
    {
        Schema::create('quality_controls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_quality_control');
            $table->integer('qty')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
