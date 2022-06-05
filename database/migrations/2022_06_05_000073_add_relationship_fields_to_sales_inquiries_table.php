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
            $table->unsignedBigInteger('id_product_id')->nullable();
            $table->foreign('id_product_id', 'id_product_fk_6695843')->references('id')->on('products');
        });
    }
}
