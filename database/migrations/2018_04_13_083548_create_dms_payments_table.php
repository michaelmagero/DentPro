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
            $table->increments('payment_id');
            $table -> integer('patient_id');
            $table->foreign('patient_id')
                    ->references('id')->on('patients')
                    ->onDelete('cascade');
            $table->string('amount');
            $table->string('payment_type');
            $table->string('invoice_number');
            $table->string('invoice_to');
            $table->string('invoice_date');
            $table->string('invoice_amount');
            $table->string('invoiced_procedure');
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
