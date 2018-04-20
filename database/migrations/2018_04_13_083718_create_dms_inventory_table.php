<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDmsInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dms_inventory', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->string('quantity');
            $table->string('product_code');
            $table->string('supplier_name');
            $table->string('price');
            $table->string('supplier_phone_number');
            $table->string('supplier_email');
            $table->string('supplier_postal_address');
            $table->string('supplier_physical_location');
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
        Schema::dropIfExists('dms_inventory');
    }
}
