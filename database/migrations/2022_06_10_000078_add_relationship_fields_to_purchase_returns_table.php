<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPurchaseReturnsTable extends Migration
{
    public function up()
    {
        Schema::table('purchase_returns', function (Blueprint $table) {
            $table->unsignedBigInteger('id_purchase_order_id')->nullable();
            $table->foreign('id_purchase_order_id', 'id_purchase_order_fk_6753163')->references('id')->on('purchase_orders');
        });
    }
}
