<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokMaterialsTable extends Migration
{
    public function up()
    {
        Schema::create('stok_materials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_material')->nullable();
            $table->string('qty')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
