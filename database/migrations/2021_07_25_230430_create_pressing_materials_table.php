<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePressingMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pressing_materials', function (Blueprint $table) {
            $table->increments('idMaterial');
            $table->integer('materialPressing')->unsigned();
            $table->foreign('materialPressing')->references('idPressingBoard')->on('pressing_boards')->onDelete('cascade')->onUpdate('cascade');
            $table->string('materialName');
            $table->boolean('materialStatus')->default(true);
            $table->string('boughtDate')->nullable();
            $table->string('materialWarranty')->nullable();
            $table->string('additionalInfos')->nullable();
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
        Schema::dropIfExists('pressing_materials');
    }
}
