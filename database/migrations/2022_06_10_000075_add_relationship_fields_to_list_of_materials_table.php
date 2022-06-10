<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToListOfMaterialsTable extends Migration
{
    public function up()
    {
        Schema::table('list_of_materials', function (Blueprint $table) {
            $table->unsignedBigInteger('id_production_plan_id')->nullable();
            $table->foreign('id_production_plan_id', 'id_production_plan_fk_6751825')->references('id')->on('tasks');
        });
    }
}
