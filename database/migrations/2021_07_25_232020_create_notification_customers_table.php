<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_customers', function (Blueprint $table) {
            $table->increments('idNotification');
            $table->integer('customer')->unsigned();
            $table->foreign('customer')->references('idCustomer')->on('customer_boards')->onDelete('cascade')->onUpdate('cascade');
            $table->text('content');
            $table->boolean('isSeen')->default(0);
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
        Schema::dropIfExists('notification_customers');
    }
}
