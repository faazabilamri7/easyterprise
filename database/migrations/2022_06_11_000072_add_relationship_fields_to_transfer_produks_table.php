<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTransferProduksTable extends Migration
{
    public function up()
    {
        Schema::table('transfer_produks', function (Blueprint $table) {
            $table->unsignedBigInteger('id_quality_control_id')->nullable();
            $table->foreign('id_quality_control_id', 'id_quality_control_fk_6769533')->references('id')->on('quality_controls');
            $table->unsignedBigInteger('product_name_id')->nullable();
            $table->foreign('product_name_id', 'product_name_fk_6769534')->references('id')->on('products');
        });
    }
}
