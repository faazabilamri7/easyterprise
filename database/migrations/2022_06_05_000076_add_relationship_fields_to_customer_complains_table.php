<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCustomerComplainsTable extends Migration
{
    public function up()
    {
        Schema::table('customer_complains', function (Blueprint $table) {
            $table->unsignedBigInteger('id_customer_id')->nullable();
            $table->foreign('id_customer_id', 'id_customer_fk_6651230')->references('id')->on('crm_customers');
        });
    }
}
