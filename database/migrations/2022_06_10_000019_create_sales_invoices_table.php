<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('sales_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_invoice')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
