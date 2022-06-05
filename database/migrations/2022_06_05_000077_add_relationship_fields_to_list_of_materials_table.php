<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToListOfMaterialsTable extends Migration
{
    public function up()
    {
        Schema::table('list_of_materials', function (Blueprint $table) {
            $table->unsignedBigInteger('production_plan_id')->nullable();
            $table->foreign('production_plan_id', 'production_plan_fk_6724503')->references('id')->on('production_plans');
        });
    }
}
