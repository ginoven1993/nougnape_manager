<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockAdjustmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_adjustments', function (Blueprint $table) {
            $table->increments('idAdjusment');
            $table->integer('adjustmentProduct')->unsigned();
            $table->foreign('adjustmentProduct')->references('idProduct')->on('pressing_products')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('ajustementReason',['USE','LOSE','DOMAGE','RECEIPT','OTHER']);
            $table->integer('beforeQty');
            $table->integer('afterQty');
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
        Schema::dropIfExists('stock_adjustments');
    }
}
