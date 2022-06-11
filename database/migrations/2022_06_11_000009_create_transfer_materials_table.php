<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferMaterialsTable extends Migration
{
    public function up()
    {
        Schema::create('transfer_materials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_transfer_material');
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
