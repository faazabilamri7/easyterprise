<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJurnalUmumsTable extends Migration
{
    public function up()
    {
        Schema::table('jurnal_umums', function (Blueprint $table) {
            $table->unsignedBigInteger('akun_id')->nullable();
            $table->foreign('akun_id', 'akun_fk_6650960')->references('id')->on('chart_of_accounts');
        });
    }
}
