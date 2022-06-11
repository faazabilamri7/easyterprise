<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('purchase_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_invoice');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}