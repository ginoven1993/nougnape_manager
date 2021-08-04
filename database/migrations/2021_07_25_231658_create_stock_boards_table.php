<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_boards', function (Blueprint $table) {
            $table->increments('idStock');
            $table->integer('stockProduct')->unsigned();
            $table->foreign('stockProduct')->references('idProduct')->on('pressing_products')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('stockQuantity');
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
        Schema::dropIfExists('stock_boards');
    }
}
