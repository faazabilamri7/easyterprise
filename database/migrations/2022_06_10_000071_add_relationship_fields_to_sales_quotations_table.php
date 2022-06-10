<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSalesQuotationsTable extends Migration
{
    public function up()
    {
        Schema::table('sales_quotations', function (Blueprint $table) {
            $table->unsignedBigInteger('kode_inquiry_id')->nullable();
            $table->foreign('kode_inquiry_id', 'kode_inquiry_fk_6734286')->references('id')->on('sales_inquiries');
        });
    }
}
