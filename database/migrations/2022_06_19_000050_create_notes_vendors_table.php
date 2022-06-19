<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesVendorsTable extends Migration
{
    public function up()
    {
        Schema::create('notes_vendors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
