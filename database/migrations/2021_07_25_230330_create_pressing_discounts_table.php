<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePressingDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pressing_discounts', function (Blueprint $table) {
            $table->increments('idDiscount');
            $table->integer('discountPressing')->unsigned();
            $table->foreign('discountPressing')->references('idPressingBoard')->on('pressing_boards')->onDelete('cascade')->onUpdate('cascade');
            $table->string('discountName');
            $table->string('discountCode')->unique();
            $table->float('discountPercent');
            $table->boolean('discountStatus')->default(0);
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
        Schema::dropIfExists('pressing_discounts');
    }
}
