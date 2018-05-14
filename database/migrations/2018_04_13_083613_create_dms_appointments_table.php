<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_appointments', function (Blueprint $table) {
            $table->increments('id');

            $table -> integer('patient_id')->unsigned()->nullable();
            $table->foreign('patient_id')
                    ->references('id')->on('dms_patients')
                    ->onDelete('cascade');
                    
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('phone_number');
            $table->string('doctor');
            $table->date('appointment_date');
            $table->string('appointment_status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dms_appointments');
    }
}
