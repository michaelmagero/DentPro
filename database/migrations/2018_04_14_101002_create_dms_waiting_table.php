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

            $table -> integer('file_no');
            $table->foreign('file_no')
                    ->references('id')->on('patients')
                    ->onDelete('cascade');

            $table->string('patient_name');
            $table->string('payment_type'); //cash or insurance
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
