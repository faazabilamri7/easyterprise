<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerComplainsTable extends Migration
{
    public function up()
    {
        Schema::create('customer_complains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('keluhan')->nullable();
            $table->longText('kritik')->nullable();
            $table->longText('saran')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
