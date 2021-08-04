<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_order_details', function (Blueprint $table) {
            $table->increments('idOrderDetail');
            $table->integer('orderBoard')->unsigned();
            $table->foreign('orderBoard')->references('idOrder')->on('customer_order_boards')->onDelete('cascade')->onUpdate('cascade');
            $table->string('orderDetailCode')->unique();
            $table->integer('orderDressing')->unsigned();
            $table->foreign('orderDressing')->references('idDressPress')->on('dressing_pressings')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('dressPrice');
            $table->integer('dressQty');
            $table->integer('washingDuration')->comment('journe->24h');
            $table->enum('washingStatus',['PENDING','ACCEPTED','WASHING','IRONING','EMBALING','STOCKING']);
            $table->integer('deliveryPrice')->default(0);
            $table->boolean('isDelivrable')->default(false);
            $table->boolean('isExpress')->default(false);
            $table->boolean('isDelivred')->default(false);
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
        Schema::dropIfExists('customer_order_details');
    }
}
