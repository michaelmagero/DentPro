<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('sex');
            $table->string('dob');
            $table->string('insurance_provider');
            $table->string('occupation');
            $table->string('postal_address');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_phone_number');
            $table->string('emergency_contact_relationship');
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
        Schema::dropIfExists('dms_patients');
    }
}
