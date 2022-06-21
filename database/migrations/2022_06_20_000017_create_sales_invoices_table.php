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
            $table->string('no_sales_invoice')->nullable();
            $table->date('tanggal')->nullable();
            $table->date('jatuh_tempo')->nullable();
            $table->decimal('total', 15, 2)->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
