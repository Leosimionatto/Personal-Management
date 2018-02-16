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

        /*
         * Routes about Projects - Participants
         */
        Route::get('/projeto/{id}/participante', 'ProjectController@participant')->name('project.participant');
        Route::get('/projeto/{id}/participante/{key}', 'ProjectController@showParticipant')->name('project.participant.show');
        Route::post('/projeto/{id}/participante/adicionar', 'ProjectController@addParticipant')->name('project.participant.add');
        Route::put('/projeto/{id}/participante/editar', 'ProjectController@editParticipant')->name('project.participant.edit');
        Route::get('/projeto/{id}/requisicao', 'ProjectController@participationRequest')->name('project.request');
        Route::post('/projeto/{id}/requisicao/editar', 'ProjectController@editParticipationRequest')->name('project.request.edit');
        Route::post('/projeto/{id}/requisicao/cancelar', 'ProjectController@cancelParticipationRequest')->name('project.request.cancel');

        /*
         * Routes about Projects - Management Group
         */
        Route::get('/projeto/{id}/administrativo', 'ProjectController@management')->name('project.management');

        /*
         * Routes about Projects - Back-end Group
         */
        Route::get('/projeto/{id}/back-end', 'ProjectController@backend')->name('project.back-end');
        Route::get('/projeto/{id}/back-end/tarefa/adicionar', 'ProjectController@addTask')->name('project.task.create');
        Route::post('/projeto/{id}/back-end/tarefa/adicionar', 'ProjectController@storeTask')->name('project.task.add');
        Route::get('/projeto/{id}/back-end/tarefa/{number}', 'ProjectController@showTask')->name('project.task.show');

        /*
         * Routes about Tasks - Steps
         */
        Route::put('etapa/status/atualizar', 'StepController@updateSituation')->name('step.status.update');
        Route::post('etapa/comentario/adicionar', 'StepController@createComment')->name('step.comment.create');

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
    Route::get('/ajax/modal/confirmacao', 'AjaxController@confirm')->name('modal.confirm');
    Route::get('/ajax/modal/recusa', 'AjaxController@recuse')->name('modal.recuse');
    Route::get('/ajax/modal/editar/requisicao/participacao', 'AjaxController@editParticipation')->name('modal.edit-participation-request');
    Route::get('/ajax/modal/cancelar/requisicao/participacao', 'AjaxController@cancelParticipation')->name('modal.cancel-participation-request');
    Route::get('/ajax/modal/participante/adicionar', 'AjaxController@addParticipant')->name('modal.add-participant');
    Route::get('/ajax/modal/participante/editar', 'AjaxController@editParticipant')->name('modal.edit-participant');
    Route::get('/ajax/etapa/{id}', 'AjaxController@stepInformation');
    Route::get('/ajax/etapa/{id}/editar', 'AjaxController@editStep');
    Route::get('/ajax/etapa/{id}/tempo/adicionar', 'AjaxController@updateTimeSpent');
    Route::get('/ajax/etapa/{id}/comentario/adicionar', 'AjaxController@createComment');

    route::get('/fireEvent', function(){
        event(new \App\Events\eventTrigger());
    });

    /*
     * Routes about Project Requests
     */
    Route::get('projeto/solicitacao/participacao/{token}', 'ProjectController@request')->name('project.participation.request');
    Route::post('projeto/solicitacao/participacao', 'ProjectController@updateRequest');
});