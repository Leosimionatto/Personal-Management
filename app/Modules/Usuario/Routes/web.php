<?php

Route::group(['prefix' => 'usuario'], function () {
    Route::group(['middleware' => 'auth:user'], function(){
        Route::get('/', 'IndexController@index')->name('index');

        /*
         * Routes about Projects
         */
        Route::get('/projeto', 'ProjectController@index')->name('project.index');
        Route::get('/projeto/cadastrar', 'ProjectController@create')->name('project.create');
        Route::post('/projeto/cadastrar', 'ProjectController@store');
        Route::get('/projeto/{id}', 'ProjectController@show')->name('project.show');
        Route::get('/projeto/{id}/participante', 'ProjectController@participant')->name('project.participant');
        Route::post('/projeto/{id}/adicionar/participante', 'ProjectController@addParticipant')->name('project.participant.add');
        Route::put('/projeto/{id}/editar/participante', 'ProjectController@editParticipant')->name('project.participant.edit');
        Route::get('/projeto/{id}/requisicao', 'ProjectController@participationRequest')->name('project.request');
        Route::post('/projeto/{id}/editar/requisicao', 'ProjectController@editParticipationRequest')->name('project.request.edit');
        Route::post('/projeto/{id}/cancelar/requisicao', 'ProjectController@cancelParticipationRequest')->name('project.request.cancel');
        Route::get('/projeto/{id}/administrativo', 'ProjectController@management')->name('project.management');

        /*
         * Routes about Notifications
         */
        Route::get('/notificacao', 'NotificationController@index')->name('notification.index');
        Route::get('/notificacao/ler', 'NotificationController@read')->name('notification.read');
        Route::get('/notificacao/ler/todas', 'NotificationController@markAll')->name('notification.mark-all-as-read');
        Route::get('/notificacao/remover', 'NotificationController@delete')->name('notification.delete');
        Route::get('/notificacao/remover/todas', 'NotificationController@deleteAll')->name('notification.delete-all');

        /*
         * Routes about Users (Participants)
         */
        Route::get('/checar-email-usuario', 'UserController@checkByEmail');
        Route::get('/checar-participacao-usuario', 'UserController@checkParticipationByEmail');

        /*
         * Route to Logout
         */
        Route::get('/logout', 'LoginController@logout')->name('logout');
    });

    /*
     * Routes about Login
     */
    Route::get('/login', [ 'as' => 'login', 'uses' => 'LoginController@index']);
    Route::post('/login', [ 'as' => 'login', 'uses' => 'LoginController@auth']);

    /*
     * Routes about Ajax Requests
     */
    Route::get('/modal/confirmacao', 'AjaxController@confirm')->name('modal.confirm');
    Route::get('/modal/recusa', 'AjaxController@recuse')->name('modal.recuse');
    Route::get('/modal/editar/requisicao/participacao', 'AjaxController@editParticipation')->name('modal.edit-participation-request');
    Route::get('/modal/cancelar/requisicao/participacao', 'AjaxController@cancelParticipation')->name('modal.cancel-participation-request');
    Route::get('/modal/participante/adicionar', 'AjaxController@addParticipant')->name('modal.add-participant');
    Route::get('/modal/participante/editar', 'AjaxController@editParticipant')->name('modal.edit-participant');

    /*
     * Routes about Project Requests
     */
    Route::get('projeto/solicitacao/participacao/{token}', 'ProjectController@request')->name('project.participation.request');
    Route::post('projeto/solicitacao/participacao', 'ProjectController@updateRequest');
});