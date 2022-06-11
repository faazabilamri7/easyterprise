<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->string('tag')->nullable();
            $table->integer('stok')->nullable();
            $table->decimal('harga_jual', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
