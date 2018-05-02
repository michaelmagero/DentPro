<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_payments', function (Blueprint $table) {
            $table->increments('id');

            $table -> integer('patient_id')->unsigned();
            $table->foreign('patient_id')
                    ->references('id')->on('dms_patients')
                    ->onDelete('cascade');

            $table -> integer('doctor_id')->unsigned();
            $table->foreign('doctor_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
        
            $table->string('procedure')->nullable();
            $table->decimal('amount_due', 13, 2)->nullable();
            $table->decimal('amount_paid', 13, 2)->nullable();
            $table->decimal('balance', 13, 2)->nullable();
            $table->date('next_appointment');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('dms_payments');
    }
}
