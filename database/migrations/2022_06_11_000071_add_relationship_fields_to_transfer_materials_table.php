<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTransferMaterialsTable extends Migration
{
    public function up()
    {
        Schema::table('transfer_materials', function (Blueprint $table) {
            $table->unsignedBigInteger('id_list_of_material_id')->nullable();
            $table->foreign('id_list_of_material_id', 'id_list_of_material_fk_6774498')->references('id')->on('list_of_materials');
        });
    }
}
