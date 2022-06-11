<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPurchaseRequitionsTable extends Migration
{
    public function up()
    {
        Schema::table('purchase_requitions', function (Blueprint $table) {
            $table->unsignedBigInteger('id_list_of_material_id')->nullable();
            $table->foreign('id_list_of_material_id', 'id_list_of_material_fk_6752068')->references('id')->on('list_of_materials');
            $table->unsignedBigInteger('material_1_id')->nullable();
            $table->foreign('material_1_id', 'material_1_fk_6751988')->references('id')->on('materials');
            $table->unsignedBigInteger('material_2_id')->nullable();
            $table->foreign('material_2_id', 'material_2_fk_6751990')->references('id')->on('materials');
            $table->unsignedBigInteger('material_3_id')->nullable();
            $table->foreign('material_3_id', 'material_3_fk_6751992')->references('id')->on('materials');
            $table->unsignedBigInteger('material_4_id')->nullable();
            $table->foreign('material_4_id', 'material_4_fk_6751994')->references('id')->on('materials');
            $table->unsignedBigInteger('material_5_id')->nullable();
            $table->foreign('material_5_id', 'material_5_fk_6751996')->references('id')->on('materials');
            $table->unsignedBigInteger('material_6_id')->nullable();
            $table->foreign('material_6_id', 'material_6_fk_6751998')->references('id')->on('materials');
        });
    }
}
