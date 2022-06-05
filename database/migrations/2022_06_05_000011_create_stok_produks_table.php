<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokProduksTable extends Migration
{
    public function up()
    {
        Schema::create('stok_produks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_produk')->nullable();
            $table->integer('qty')->nullable();
            $table->string('sku')->nullable();
            $table->decimal('biaya_produksi', 15, 2)->nullable();
            $table->decimal('harga_jual', 15, 2)->nullable();
            $table->string('kategori')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
