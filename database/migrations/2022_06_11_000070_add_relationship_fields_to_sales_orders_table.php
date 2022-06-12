<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSalesOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('sales_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('id_sales_quotation_id')->nullable();
            $table->foreign('id_sales_quotation_id', 'id_sales_quotation_fk_6769598')->references('id')->on('sales_quotations');
        });
    }
}
