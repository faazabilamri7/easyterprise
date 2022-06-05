<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_material');
            $table->decimal('price', 15, 2);
            $table->longText('descriptive')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
