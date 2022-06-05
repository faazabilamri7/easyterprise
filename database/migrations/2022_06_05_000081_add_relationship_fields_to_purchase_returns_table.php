<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPurchaseReturnsTable extends Migration
{
    public function up()
    {
        Schema::table('purchase_returns', function (Blueprint $table) {
            $table->unsignedBigInteger('id_order_id')->nullable();
            $table->foreign('id_order_id', 'id_order_fk_6730805')->references('id')->on('purchase_orders');
        });
    }
}
