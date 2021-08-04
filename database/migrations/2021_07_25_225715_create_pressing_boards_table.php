<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePressingBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pressing_boards', function (Blueprint $table) {
            $table->increments('idPressingBoard');
            $table->string('pressingName')->unique();
            $table->string('pressingCodeName')->unique();
            $table->string('pressingLocation');
            $table->string('pressingPhones');
            $table->string('pressingEmail')->nullable();
            $table->string('pressingSlogan')->nullable();
            $table->boolean('pressingLogo')->nullable();
            $table->integer('pressingCreator')->unsigned();
            $table->foreign('pressingCreator')->references('idRoot')->on('roots')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('deliveryPrice')->default(0);
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
        Schema::dropIfExists('pressing_boards');
    }
}
