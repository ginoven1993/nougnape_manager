<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRootsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roots', function (Blueprint $table) {
            $table->increments('idRoot');
            $table->string('rootFirstname');
            $table->string('rootLastname');
            $table->string('rootPhoneNumber');
            $table->string('rootPassword');
            $table->boolean('rootStatus')->default(true);
            $table->integer('rootCreator')->nullable();
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
        Schema::dropIfExists('roots');
    }
}
