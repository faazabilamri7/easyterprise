<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSalesInquiriesTable extends Migration
{
    public function up()
    {
        Schema::table('sales_inquiries', function (Blueprint $table) {
            $table->unsignedBigInteger('id_customer_id')->nullable();
            $table->foreign('id_customer_id', 'id_customer_fk_6651168')->references('id')->on('crm_customers');
            $table->unsignedBigInteger('nama_produk_id')->nullable();
            $table->foreign('nama_produk_id', 'nama_produk_fk_6734287')->references('id')->on('products');
        });
    }
}
