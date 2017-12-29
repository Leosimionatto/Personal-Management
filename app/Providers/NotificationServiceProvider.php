<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        /*
        |--------------------------------------------------------------------------
        | Composer de Notificações
        |--------------------------------------------------------------------------
        */
        View::composer('usuario::*', 'App\Composers\NotificationComposer');
    }
}