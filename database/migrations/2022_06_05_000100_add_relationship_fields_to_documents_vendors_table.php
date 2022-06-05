<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDocumentsVendorsTable extends Migration
{
    public function up()
    {
        Schema::table('documents_vendors', function (Blueprint $table) {
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->foreign('vendor_id', 'vendor_fk_6725925')->references('id')->on('vendors');
        });
    }
}
