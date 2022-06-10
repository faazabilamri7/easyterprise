<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTasksTable extends Migration
{
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('id_request_product_id')->nullable();
            $table->foreign('id_request_product_id', 'id_request_product_fk_6751814')->references('id')->on('request_stock_products');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_6751789')->references('id')->on('task_statuses');
        });
    }
}
