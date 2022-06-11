<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToNecaraSaldosTable extends Migration
{
    public function up()
    {
        Schema::table('necara_saldos', function (Blueprint $table) {
            $table->unsignedBigInteger('akun_id')->nullable();
            $table->foreign('akun_id', 'akun_fk_6651062')->references('id')->on('akuns');
        });
    }
}
