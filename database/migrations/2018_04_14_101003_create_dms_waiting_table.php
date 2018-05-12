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
        Schema::create('dms_waitings', function (Blueprint $table) {
            $table->increments('id');

            $table -> integer('patient_id')->nullable()->unsigned()->default(0);
            $table->foreign('patient_id')
                    ->references('id')->on('dms_patients')
                    ->onDelete('cascade');

            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('payment_mode');
            $table->decimal('amount_allocated', 13, 2)->nullable();
            $table->string('doctor')->nullable();
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
        Schema::dropIfExists('dms_waitings');
    }
}
