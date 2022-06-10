<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialEntriesTable extends Migration
{
    public function up()
    {
        Schema::create('material_entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_material_entry')->nullable();
            $table->date('date_material_entry')->nullable();
            $table->string('material_name')->nullable();
            $table->integer('qty')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
