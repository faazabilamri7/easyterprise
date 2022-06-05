<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVendorsTable extends Migration
{
    public function up()
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->unsignedBigInteger('id_purchase_inquiry_id')->nullable();
            $table->foreign('id_purchase_inquiry_id', 'id_purchase_inquiry_fk_6730513')->references('id')->on('purchase_inqs');
        });
    }
}
