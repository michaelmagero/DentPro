<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_no');
            $table -> integer('payment_id')->nullable()->unsigned()->default(0);
            $table->foreign('payment_id')
                    ->references('id')->on('dms_payments')
                    ->onDelete('cascade');
            
            $table -> integer('patient_id')->nullable()->unsigned()->default(0);
            $table->foreign('patient_id')
                    ->references('id')->on('dms_patients')
                    ->onDelete('cascade');

            $table -> integer('provider_id')->nullable()->unsigned()->default(0);
            $table->foreign('provider_id')
                    ->references('id')->on('dms_insurance_providers')
                    ->onDelete('cascade');

            $table->string('procedure');
            $table->string('amount');
            $table->string('total');
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
        Schema::dropIfExists('dms_invoices');
    }
}
