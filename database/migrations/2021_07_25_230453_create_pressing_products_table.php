<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePressingProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pressing_products', function (Blueprint $table) {
            $table->increments('idProduct');
            $table->integer('productPressing')->unsigned();
            $table->foreign('productPressing')->references('idPressingBoard')->on('pressing_boards')->onDelete('cascade')->onUpdate('cascade');
            $table->string('productName');
            $table->string('productCodeName')->unique();
            $table->integer('productQuantity')->default(0);
            $table->boolean('productStatus')->default(0);
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
        Schema::dropIfExists('pressing_products');
    }
}
