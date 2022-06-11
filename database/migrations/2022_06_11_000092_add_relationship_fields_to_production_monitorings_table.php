<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductionMonitoringsTable extends Migration
{
    public function up()
    {
        Schema::table('production_monitorings', function (Blueprint $table) {
            $table->unsignedBigInteger('id_list_of_material_id')->nullable();
            $table->foreign('id_list_of_material_id', 'id_list_of_material_fk_6768469')->references('id')->on('list_of_materials');
        });
    }
}
