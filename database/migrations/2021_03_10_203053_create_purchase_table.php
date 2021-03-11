<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('prduct_name');
            $table->integer('supplier_id');
            $table->integer('brand_id');
            $table->string('supplier_email');
            $table->string('quantity');
            $table->string('date_supplied');
            $table->string('unit_price');
            $table->string('phone_number');
            $table->string('total_amount');
            $table->string('invoice_id');
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
        Schema::dropIfExists('purchase');
    }
}
