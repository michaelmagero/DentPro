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
            $table->date('dob');
            $table->string('payment_mode');
            $table->decimal('amount_allocated', 13, 2)->nullable();
            $table->string('occupation');
            $table->string('postal_address');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_phone_number');
            $table->string('emergency_contact_relationship');
            $table->string('doctor')->nullable();
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
