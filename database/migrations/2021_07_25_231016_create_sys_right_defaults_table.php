<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysRightDefaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_right_defaults', function (Blueprint $table) {
            $table->increments('idRightDefault');
            $table->integer('sysModule')->unsigned();
            $table->foreign('sysModule')->references('idSysModule')->on('sys_modules')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('create')->default(true);
            $table->boolean('read')->default(true);
            $table->boolean('update')->default(false);
            $table->boolean('delete')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_right_defaults');
    }
}
