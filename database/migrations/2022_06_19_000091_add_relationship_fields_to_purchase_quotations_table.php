<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPurchaseQuotationsTable extends Migration
{
    public function up()
    {
        Schema::table('purchase_quotations', function (Blueprint $table) {
            $table->unsignedBigInteger('id_purchase_inquiry_id')->nullable();
            $table->foreign('id_purchase_inquiry_id', 'id_purchase_inquiry_fk_6752242')->references('id')->on('purchase_inqs');
            $table->unsignedBigInteger('id_vendor_id')->nullable();
            $table->foreign('id_vendor_id', 'id_vendor_fk_6730745')->references('id')->on('vendors');
        });
    }
}
