<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOrderDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_order_deliveries', function (Blueprint $table) {
            $table->increments('idOrderDelivery');
            $table->integer('orderBoard')->unsigned();
            $table->foreign('OrderBoard')->references('idOrder')->on('customer_order_boards')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('orderDeliver')->unsigned();
            $table->foreign('orderDeliver')->references('idPersonalBoard')->on('personal_boards')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('deliveryStatus')->default(false);
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
        Schema::dropIfExists('customer_order_deliveries');
    }
}
