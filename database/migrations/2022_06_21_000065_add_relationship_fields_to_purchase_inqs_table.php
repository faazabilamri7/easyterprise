<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPurchaseInqsTable extends Migration
{
    public function up()
    {
        Schema::table('purchase_inqs', function (Blueprint $table) {
            $table->unsignedBigInteger('id_request_for_quotation_id')->nullable();
            $table->foreign('id_request_for_quotation_id', 'id_request_for_quotation_fk_6752974')->references('id')->on('request_for_quotations');
            $table->unsignedBigInteger('vendor_name_id')->nullable();
            $table->foreign('vendor_name_id', 'vendor_name_fk_6752237')->references('id')->on('vendors');
            $table->unsignedBigInteger('material_name_id')->nullable();
            $table->foreign('material_name_id', 'material_name_fk_6804830')->references('id')->on('materials');
        });
    }
}
