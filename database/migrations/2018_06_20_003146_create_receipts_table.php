<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_receipts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('receipt_no');
            $table -> integer('payment_id')->nullable()->unsigned()->default(0);
            $table->foreign('payment_id')
                    ->references('id')->on('dms_payments')
                    ->onDelete('cascade');
            
            $table -> integer('patient_id')->nullable()->unsigned()->default(0);
            $table->foreign('patient_id')
                    ->references('id')->on('dms_patients')
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
        Schema::dropIfExists('dms_receipts');
    }
}
