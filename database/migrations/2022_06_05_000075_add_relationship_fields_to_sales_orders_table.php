<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSalesOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('sales_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_fk_6577462')->references('id')->on('crm_customers');
            $table->unsignedBigInteger('sales_quotation_id')->nullable();
            $table->foreign('sales_quotation_id', 'sales_quotation_fk_6577463')->references('id')->on('sales_quotations');
        });
    }
}
