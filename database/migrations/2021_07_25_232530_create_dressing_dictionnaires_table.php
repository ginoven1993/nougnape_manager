<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDressingDictionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dressing_dictionnaires', function (Blueprint $table) {
            $table->increments('idDressingDico');
            $table->string('dressName')->unique();
            $table->string('dressCodeName')->unique();
            $table->integer('dressPrice');
            $table->boolean('dressStatus')->default(true);
            $table->integer('dressCreator')->unsigned();
            $table->foreign('dressCreator')->references('idRoot')->on('roots')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('dressing_dictionnaires');
    }
}
