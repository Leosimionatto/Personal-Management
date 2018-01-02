<?php

namespace App\Modules\Usuario\Http\Controllers;

use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NotificationController extends Controller{

    /**
     * @var NotificationService
     */
    protected $service;

    /**
     * NotificationController constructor.
     *
     * @param NotificationService $service
     */
    public function __construct(NotificationService $service)
    {
        $this->service = $service;
    }

    /**
     * Method to show All User Notifications
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('usuario::notifications.index');
    }

    /**
     * Method to mark Notification as read
     *
     * @param Request $request
     * @return array
     */
    public function read(Request $request)
    {
        return $this->service->read($request->all());
    }

    /**
     * Method to mark All User Notifications as Read
     *
     * @return array
     */
    public function markAll()
    {
        return $this->service->markAllAsRead();
    }

    /**
     * Method to delete all User Notifications
     *
     * @return array
     */
    public function deleteAll()
    {
        return $this->service->deleteAll();
    }

    /**
     * Method to delete an Notification
     *
     * @param Request $request
     * @return array
     */
    public function delete(Request $request)
    {
        return $this->service->delete($request->all());
    }

}