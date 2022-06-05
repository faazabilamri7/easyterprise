<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSalesQuotationsTable extends Migration
{
    public function up()
    {
        Schema::table('sales_quotations', function (Blueprint $table) {
            $table->unsignedBigInteger('id_sales_inquiry_id')->nullable();
            $table->foreign('id_sales_inquiry_id', 'id_sales_inquiry_fk_6651194')->references('id')->on('sales_inquiries');
            $table->unsignedBigInteger('id_customer_id')->nullable();
            $table->foreign('id_customer_id', 'id_customer_fk_6651195')->references('id')->on('crm_customers');
        });
    }
}
