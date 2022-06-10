<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMaterialEntriesTable extends Migration
{
    public function up()
    {
        Schema::table('material_entries', function (Blueprint $table) {
            $table->unsignedBigInteger('id_purchase_order_id')->nullable();
            $table->foreign('id_purchase_order_id', 'id_purchase_order_fk_6752996')->references('id')->on('purchase_orders');
        });
    }
}
