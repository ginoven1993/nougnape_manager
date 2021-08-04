<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOrderBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_order_boards', function (Blueprint $table) {
            $table->increments('idOrder');
            $table->integer('orderCustomer')->unsigned();
            $table->foreign('orderCustomer')->references('idCustomer')->on('customer_boards')->onDelete('cascade')->onUpdate('cascade');
            $table->string('orderPressing');
            $table->string('orderBoardCode')->unique();
            $table->integer('SubPrice');
            $table->integer('discount')->default(0);
            $table->integer('delivery')->default(0);
            $table->integer('orderTotalPrice');
            $table->boolean('orderStatus')->default(true);
            $table->integer('orderRestant')->default(0);
            $table->enum('paymentMethod',['CASH','MOBILE_MONEY']);
            $table->boolean('isPaid')->default(false);
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
        Schema::dropIfExists('customer_order_boards');
    }
}
