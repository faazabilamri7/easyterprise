<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInvoicePembeliansTable extends Migration
{
    public function up()
    {
        Schema::table('invoice_pembelians', function (Blueprint $table) {
            $table->unsignedBigInteger('perusahaan_id')->nullable();
            $table->foreign('perusahaan_id', 'perusahaan_fk_6651224')->references('id')->on('vendors');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_fk_6651225')->references('id')->on('crm_customers');
        });
    }
}
