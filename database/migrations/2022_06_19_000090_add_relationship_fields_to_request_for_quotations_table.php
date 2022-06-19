<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRequestForQuotationsTable extends Migration
{
    public function up()
    {
        Schema::table('request_for_quotations', function (Blueprint $table) {
            $table->unsignedBigInteger('id_purchase_requisition_id')->nullable();
            $table->foreign('id_purchase_requisition_id', 'id_purchase_requisition_fk_6752232')->references('id')->on('purchase_requitions');
            $table->unsignedBigInteger('material_name_id')->nullable();
            $table->foreign('material_name_id', 'material_name_fk_6820266')->references('id')->on('materials');
        });
    }
}
