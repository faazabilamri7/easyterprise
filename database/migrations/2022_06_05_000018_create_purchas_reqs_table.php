<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasReqsTable extends Migration
{
    public function up()
    {
        Schema::create('purchas_reqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_list_of_material')->nullable();
            $table->date('date_purchase_requisition')->nullable();
            $table->decimal('total_price', 15, 2)->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
