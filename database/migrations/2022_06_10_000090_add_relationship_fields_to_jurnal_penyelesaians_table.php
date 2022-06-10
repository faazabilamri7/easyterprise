<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJurnalPenyelesaiansTable extends Migration
{
    public function up()
    {
        Schema::table('jurnal_penyelesaians', function (Blueprint $table) {
            $table->unsignedBigInteger('akun_id')->nullable();
            $table->foreign('akun_id', 'akun_fk_6651124')->references('id')->on('akuns');
        });
    }
}
