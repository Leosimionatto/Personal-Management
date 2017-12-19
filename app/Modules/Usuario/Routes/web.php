<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'usuario'], function () {
    Route::get('/', 'IndexController@index')->name('index');

    /**
     * Routes about projects
     */
    Route::get('/projeto', 'ProjectController@index')->name('project.index');
    Route::get('/projeto/cadastrar', 'ProjectController@create')->name('project.create');
    Route::post('/projeto/cadastrar', 'ProjectController@store');
    Route::get('/projeto/{id}', 'ProjectController@show')->name('project.show');
    Route::get('/projeto/{id}/administrativo', 'ProjectController@management')->name('project.management');
});
