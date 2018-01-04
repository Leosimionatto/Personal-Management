<?php

namespace App\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NotificationComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if(empty($view->getData()['notifications'])){
            $view->with('notifications', (!empty(Auth::guard('user')->user()) ? Auth::guard('user')->user()->unreadNotifications : ''));
        }
    }
}