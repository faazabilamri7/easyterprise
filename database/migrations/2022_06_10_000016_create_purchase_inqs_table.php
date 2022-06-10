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
            $table->string('id_purchase_inquiry')->nullable();
            $table->date('date_puchase_inquiry')->nullable();
            $table->integer('qty')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
