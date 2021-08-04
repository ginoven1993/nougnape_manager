<?php

use Facade\FlareClient\Flare;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\PseudoTypes\False_;

class CreatePersonalBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_boards', function (Blueprint $table) {
            $table->increments('idPersonalBoard');
            $table->integer('personalPressing')->unsigned();
            $table->foreign('personalPressing')->references('idPressingBoard')->on('pressing_boards')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('personalRole')->unsigned();
            $table->foreign('personalRole')->references('idPersonalRole')->on('personal_roles')->onDelete('cascade')->onUpdate('cascade');
            $table->string('personalFirstname');
            $table->string('personalLastname');
            $table->string('personalCodeName');
            $table->string('personalPhoneNumber');
            $table->string('personalPassword');
            $table->string('personalEmail')->nullable();
            $table->string('personalLocation');
            $table->string('personalSalary')->nullable();
            $table->string('personalJoindDate')->nullable();
            $table->boolean('personalStatus')->default(true);
            $table->boolean('isAdmin')->default(false);
            $table->integer('personalAuthor');
            $table->enum('authorType',['ROOT','PERSONAL']);
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
        Schema::dropIfExists('personal_boards');
    }
}
