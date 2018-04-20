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
            $table->increments('appointment_id');

            $table -> integer('file_no');
            $table->foreign('file_no')
                    ->references('id')->on('patients')
                    ->onDelete('cascade');

            $table -> integer('patient_id');
            $table->foreign('patient_id')
                    ->references('id')->on('patients')
                    ->onDelete('cascade');
                    
            $table->string('patient_name');
            $table->string('doctor');
            $table->string('appointment_date');
            $table->string('appointment_status');
            $table->string('account_balance'); //account balance for patient
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
        Schema::dropIfExists('dms_appointments');
    }
}
