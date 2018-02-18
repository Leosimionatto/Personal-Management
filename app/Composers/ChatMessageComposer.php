<?php

namespace App\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ChatMessageComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if(empty($view->getData()['conversations'])){
            $view->with('conversations', (!empty(Auth::guard('user')->user()) ? Auth::guard('user')->user()->messages : ''));
        }
    }
}