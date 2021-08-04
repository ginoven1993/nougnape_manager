<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_boards', function (Blueprint $table) {
            $table->increments('idCustomer');
            $table->integer('customerPressing')->unsigned();
            $table->foreign('customerPressing')->references('idPressingBoard')->on('pressing_boards')->onDelete('cascade');
            $table->string('customerName');
            $table->string('customerCodeName')->unique();
            $table->string('customerPhoneNumber');
            $table->integer('customerCodePIN')->default('1234');
            $table->boolean('customerStatus')->default(true);
            $table->string('customerLocation');
            $table->string('locationLatitude')->nullable();
            $table->string('locationLongitude')->nullable();
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('idPersonalBoard')->on('personal_boards')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('customer_boards');
    }
}
