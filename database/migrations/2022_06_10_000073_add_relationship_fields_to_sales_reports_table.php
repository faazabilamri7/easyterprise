<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSalesReportsTable extends Migration
{
    public function up()
    {
        Schema::table('sales_reports', function (Blueprint $table) {
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_6734172')->references('id')->on('sales_orders');
            $table->unsignedBigInteger('tgl_sales_order_id')->nullable();
            $table->foreign('tgl_sales_order_id', 'tgl_sales_order_fk_6734173')->references('id')->on('sales_orders');
            $table->unsignedBigInteger('no_sales_order_id')->nullable();
            $table->foreign('no_sales_order_id', 'no_sales_order_fk_6734411')->references('id')->on('sales_orders');
        });
    }
}
