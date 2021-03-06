<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPurchaseOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('purchase_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('id_purchase_quotation_id')->nullable();
            $table->foreign('id_purchase_quotation_id', 'id_purchase_quotation_fk_6752295')->references('id')->on('purchase_quotations');
            $table->unsignedBigInteger('material_name_id')->nullable();
            $table->foreign('material_name_id', 'material_name_fk_6774906')->references('id')->on('materials');
        });
    }
}
