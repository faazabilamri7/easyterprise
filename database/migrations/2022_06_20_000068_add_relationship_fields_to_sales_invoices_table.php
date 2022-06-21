<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSalesInvoicesTable extends Migration
{
    public function up()
    {
        Schema::table('sales_invoices', function (Blueprint $table) {
            $table->unsignedBigInteger('sales_order_id')->nullable();
            $table->foreign('sales_order_id', 'sales_order_fk_6833864')->references('id')->on('sales_orders');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_fk_6833865')->references('id')->on('crm_customers');
        });
    }
}
