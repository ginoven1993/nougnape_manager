<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_permissions', function (Blueprint $table) {
            $table->increments('idSysPermission');
            $table->integer('permissionUser')->unsigned();
            $table->foreign('permissionUser')->references('idPersonalBoard')->on('personal_boards')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('permissionModule')->unsigned();
            $table->foreign('permissionModule')->references('idSysModule')->on('sys_modules')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('canCreate')->default(true);
            $table->boolean('canRead')->default(true);
            $table->boolean('canUpdate')->default(false);
            $table->boolean('canDelete')->default(false);
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
        Schema::dropIfExists('sys_permissions');
    }
}
