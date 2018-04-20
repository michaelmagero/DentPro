<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsInsuranceProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_insurance_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone_number_one');
            $table->string('phone_number_two');
            $table->string('phone_number_three');
            $table->string('postal_address');
            $table->string('supplier_email');
            $table->string('physical_location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_insurance_providers');
    }
}
