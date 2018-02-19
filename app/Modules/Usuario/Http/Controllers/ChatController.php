<?php

namespace App\Modules\Usuario\Http\Controllers;

use App\Services\MessageService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ChatController extends Controller{

    /**
     * @var MessageService
     */
    protected $messageService;

    /**
     * ChatController constructor.
     *
     * @param MessageService $messageService
     */
    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    /**
     * Method to send an Message
     *
     * @param $id
     * @param Request $request
     * @return array
     */
    public function send($id, Request $request)
    {
        return $this->messageService->send($request->all());
    }
}