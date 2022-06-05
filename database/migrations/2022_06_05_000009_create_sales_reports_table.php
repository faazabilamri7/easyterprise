<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesReportsTable extends Migration
{
    public function up()
    {
        Schema::create('sales_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal_laporan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
