<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsWaitingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_waiting', function (Blueprint $table) {
            $table->increments('id');

            $table -> integer('patient_id')->nullable()->unsigned()->default(0);
            $table->foreign('patient_id')
                    ->references('id')->on('dms_patients')
                    ->onDelete('cascade');

            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('payment_mode'); //cash or insurance
            $table->string('amount_allocated');
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
        Schema::dropIfExists('dms_waiting');
    }
}
