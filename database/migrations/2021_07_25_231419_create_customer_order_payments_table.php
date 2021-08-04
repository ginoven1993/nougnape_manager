<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOrderPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_order_payments', function (Blueprint $table) {
            $table->increments('idPayment');
            $table->integer('paymentOrder')->unsigned();
            $table->foreign('paymentOrder')->references('idOrder')->on('customer_order_boards')->onDelete('cascade')->onUpdate('cascade');
            $table->string('paymentReference')->nullable();
            $table->string('paymentToken')->nullable();
            $table->integer('paymentPrice');
            $table->string('paymentComission')->nullable();
            $table->boolean('paymentStatus')->default(0);
            $table->enum('paymentGateway',['MOOV','TOGOCOM']);
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
        Schema::dropIfExists('customer_order_payments');
    }
}
