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
            $table->foreign('id_request_for_quotation_id', 'id_request_for_quotation_fk_6730481')->references('id')->on('request_for_quotations');
        });
    }
}
