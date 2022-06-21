<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBukuBesarsTable extends Migration
{
    public function up()
    {
        Schema::table('buku_besars', function (Blueprint $table) {
            $table->unsignedBigInteger('akun_id')->nullable();
            $table->foreign('akun_id', 'akun_fk_6651046')->references('id')->on('chart_of_accounts');
        });
    }
}
