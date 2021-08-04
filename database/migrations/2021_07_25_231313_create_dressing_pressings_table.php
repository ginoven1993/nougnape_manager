<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDressingPressingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dressing_pressings', function (Blueprint $table) {
            $table->increments('idDressPress');
            $table->integer('pressingBoard')->unsigned();
            $table->foreign('pressingBoard')->references('idPressingBoard')->on('pressing_boards')->onDelete('cascade')->onUpdate('cascade');
            $table->string('dressName');
            $table->string('dressCodeName')->unique();
            $table->integer('dressPrice');
            $table->string('dressingCover')->default('default_dressing_cover.png');
            $table->boolean('dessStatus')->default(false);
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
        Schema::dropIfExists('dressing_pressings');
    }
}
