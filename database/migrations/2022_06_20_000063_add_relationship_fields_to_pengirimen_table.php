<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPengirimenTable extends Migration
{
    public function up()
    {
        Schema::table('pengirimen', function (Blueprint $table) {
            $table->unsignedBigInteger('no_sales_order_id')->nullable();
            $table->foreign('no_sales_order_id', 'no_sales_order_fk_6820539')->references('id')->on('sales_orders');
        });
    }
}
