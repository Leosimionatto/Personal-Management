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

Route::group(['prefix' => 'usuarios'], function () {
    /*
     * Rotas referente a projetos
     */
    Route::get('/projetos', 'ProjectController@index')->name('projects.index');
    Route::get('/projetos/novo-projeto', 'ProjectController@add')->name('projects.new-project');
    Route::post('/projetos/adicionar-projeto', 'ProjectController@store');

});
