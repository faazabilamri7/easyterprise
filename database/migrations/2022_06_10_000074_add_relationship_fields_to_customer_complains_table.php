<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCustomerComplainsTable extends Migration
{
    public function up()
    {
        Schema::table('customer_complains', function (Blueprint $table) {
            $table->unsignedBigInteger('sales_order_id')->nullable();
            $table->foreign('sales_order_id', 'sales_order_fk_6734104')->references('id')->on('sales_orders');
        });
    }
}
