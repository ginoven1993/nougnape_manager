<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'Sys_log'], function() {
    Route::get('/','Systemes\Sys_logController@index')->name('Sys_log.index');
    Route::get('/create','Systemes\Sys_logController@create')->name('Sys_log.create');
    Route::post('/store','Systemes\Sys_logController@store')->name('Sys_log.store');
    Route::get('/show/{id}','Systemes\Sys_logController@show')->name('Sys_log.show');
    Route::get('/edit/{id}','Systemes\Sys_logController@edit')->name('Sys_log.edit');
    Route::post('/update/{id}','Systemes\Sys_logController@update')->name('Sys_log.update');
    Route::get('/delete/{id}','Systemes\Sys_logController@destroy')->name('Sys_log.delete');
});

Route::group(['prefix' => 'Sys_module'], function() {
    Route::get('/','Systemes\Sys_moduleController@index')->name('Sys_module.index');
    Route::get('/create','Systemes\Sys_moduleController@create')->name('Sys_module.create');
    Route::post('/store','Systemes\Sys_moduleController@store')->name('Sys_module.store');
    Route::get('/show/{id}','Systemes\Sys_moduleController@show')->name('Sys_module.show');
    Route::get('/edit/{id}','Systemes\Sys_moduleController@edit')->name('Sys_module.edit');
    Route::post('/update/{id}','Systemes\Sys_moduleController@update')->name('Sys_module.update');
    Route::get('/delete/{id}','Systemes\Sys_moduleController@destroy')->name('Sys_module.delete');
});

Route::group(['prefix' => 'Sys_permission'], function() {
    Route::get('/','Systemes\Sys_permissionController@index')->name('Sys_permission.index');
    Route::get('/create','Systemes\Sys_permissionController@create')->name('Sys_permission.create');
    Route::post('/store','Systemes\Sys_permissionController@store')->name('Sys_permission.store');
    Route::get('/show/{id}','Systemes\Sys_permissionController@show')->name('Sys_permission.show');
    Route::get('/edit/{id}','Systemes\Sys_permissionController@edit')->name('Sys_permission.edit');
    Route::post('/update/{id}','Systemes\Sys_permissionController@update')->name('Sys_permission.update');
    Route::get('/delete/{id}','Systemes\Sys_permissionController@destroy')->name('Sys_permission.delete');
});

Route::group(['prefix' => 'Sys_right_default'], function() {
    Route::get('/','Systemes\Sys_right_defaultController@index')->name('Sys_right_default.index');
    Route::get('/create','Systemes\Sys_right_defaultController@create')->name('Sys_right_default.create');
    Route::post('/store','Systemes\Sys_right_defaultController@store')->name('Sys_right_default.store');
    Route::get('/show/{id}','Systemes\Sys_right_defaultController@show')->name('Sys_right_default.show');
    Route::get('/edit/{id}','Systemes\Sys_right_defaultController@edit')->name('Sys_right_default.edit');
    Route::post('/update/{id}','Systemes\Sys_right_defaultController@update')->name('Sys_right_default.update');
    Route::get('/delete/{id}','Systemes\Sys_right_defaultController@destroy')->name('Sys_right_default.delete');
});

Route::group(['prefix' => 'Personal_presence'], function() {
    Route::get('/','personalpresenceController@index')->name('Peronal_presence.index');
    Route::get('/create','personalpresenceController@create')->name('Peronal_presence.create');
    Route::post('/store','personalpresenceController@store')->name('Peronal_presence.store');
    Route::get('/show/{id}','personalpresenceController@show')->name('Peronal_presence.show');
    Route::get('/edit/{id}','personalpresenceController@edit')->name('Peronal_presence.edit');
    Route::post('/update/{id}','personalpresenceController@update')->name('Peronal_presence.update');
    Route::get('/delete/{id}','personalpresenceController@destroy')->name('Peronal_presence.delete');
});

Route::group(['prefix' => 'Personal_role'], function() {
    Route::get('/','personalroleController@index')->name('Peronal_role.index');
    Route::get('/create','personalroleController@create')->name('Peronal_role.create');
    Route::post('/store','personalroleController@store')->name('Peronal_role.store');
    Route::get('/show/{id}','personalroleController@show')->name('Peronal_role.show');
    Route::get('/edit/{id}','personalroleController@edit')->name('Peronal_role.edit');
    Route::post('/update/{id}','personalroleController@update')->name('Peronal_role.update');
    Route::get('/delete/{id}','personalroleController@destroy')->name('Peronal_role.delete');
});

Route::group(['prefix' => 'Personal_board'], function() {
    Route::get('/','personalboardController@index')->name('Personal_board.index');
    Route::get('/create','personalboardController@create')->name('Personal_board.create');
    Route::post('/store','personalboardController@store')->name('Personal_board.store');
    Route::get('/show/{id}','personalboardController@show')->name('Personal_board.show');
    Route::get('/edit/{id}','personalboardController@edit')->name('Personal_board.edit');
    Route::post('/update/{id}','personalboardController@update')->name('Personal_board.update');
    Route::get('/delete/{id}','personalboardController@destroy')->name('Personal_board.delete');
});





