<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseInqsTable extends Migration
{
    public function up()
    {
        Schema::create('purchase_inqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_purchase_inquiry')->nullable();
            $table->string('material_name')->nullable();
            $table->integer('quantity')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
