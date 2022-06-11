<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmNotesTable extends Migration
{
    public function up()
    {
        Schema::create('crm_notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('keluhan')->nullable();
            $table->string('kritik')->nullable();
            $table->string('saran')->nullable();
            $table->longText('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
