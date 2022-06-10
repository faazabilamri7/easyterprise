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
            $table->string('id_list_of_material')->nullable();
            $table->integer('request_air')->nullable();
            $table->integer('request_sukrosa')->nullable();
            $table->integer('request_dektrose')->nullable();
            $table->integer('request_perisa_yakult')->nullable();
            $table->integer('request_susu_bubuk_krim')->nullable();
            $table->integer('request_polietilena_tereftalat')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
