<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('department_id');
            $table->integer('college_id');
            $table->integer('product_id');
            $table->string('quantity');
            $table->string('requisition_number');
            $table->string('requisition_date');
            $table->string('unit_price');
            $table->string('issue_date');
            $table->string('invoice_id');
            $table->string('total_cost');
            $table->integer('created_by');
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
        Schema::dropIfExists('orders');
    }
}
