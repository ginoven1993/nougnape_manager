<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationPersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_personals', function (Blueprint $table) {
            $table->increments('idNotification');
            $table->integer('notificationUser')->unsigned();
            $table->foreign('notificationUser')->references('idPersonalBoard')->on('personal_boards')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('notification_personals');
    }
}
