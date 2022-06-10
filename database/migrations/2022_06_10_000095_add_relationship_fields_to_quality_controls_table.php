<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToQualityControlsTable extends Migration
{
    public function up()
    {
        Schema::table('quality_controls', function (Blueprint $table) {
            $table->unsignedBigInteger('id_production_monitoring_id')->nullable();
            $table->foreign('id_production_monitoring_id', 'id_production_monitoring_fk_6768479')->references('id')->on('production_monitorings');
        });
    }
}
