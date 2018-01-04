<?php

namespace App\Services;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotificationService{

    /**
     * @var Notification
     */
    protected $notification;

    /**
     * NotificationService constructor.
     *
     * @param Notification $notification
     */
    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    /**
     * Method to get all User Notifications
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all($id)
    {
        return $this->notification->all()->where('notifiable_id', '=', $id);
    }

    /**
     * Method to find specific Notification
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->notification->find($id);
    }

    /**
     * Method to mark Notification as read
     *
     * @param $data
     * @return array
     */
    public function read($data)
    {
        DB::beginTransaction();
        try{
            $notification = $this->find($data['id']);

            if(is_object($notification)){
                $post = [
                    'read_at' => date('Y-m-d H:i:s')
                ];

                $notification->update($post);

                DB::commit();
                return ['status' => '00'];
            }

            DB::rollback();
            return ['status' => '01', 'message' => 'A notificação informada não existe.'];
        }catch(\Exception $e){
            DB::rollback();
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }

    /**
     * Method to mark Notification as read
     *
     * @return array
     */
    public function markAllAsRead()
    {
        DB::beginTransaction();
        try{
            $notifications = $this->notification->all()->where('notifiable_id', '=', Auth::guard('user')->user()->id);

            $post = [
                'read_at' => date('Y-m-d H:i:s')
            ];

            foreach($notifications as $notification){
                $notification->update($post);
            }

            DB::commit();
            return ['status' => '00'];
        }catch(\Exception $e){
            DB::rollback();
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }

    /**
     * Method to delete all User Notifications
     *
     * @return array
     */
    public function deleteAll()
    {
        DB::beginTransaction();
        try{
            $notifications = $this->notification->all()->where('notifiable_id', '=', Auth::guard('user')->user()->id);

            foreach($notifications as $notification){
                $notification->delete();
            }

            DB::commit();
            return ['status' => '00'];
        }catch(\Exception $e){
            DB::rollback();
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }

    /**
     * Method to delete an Notification
     *
     * @param $data
     * @return array
     */
    public function delete($data)
    {
        DB::beginTransaction();
        try{
            $notification = $this->find($data['id']);

            if(is_object($notification)){
                $notification->delete();

                DB::commit();
                return ['status' => '00'];
            }

            DB::rollback();
            return ['status' => '01', 'message' => 'A notificação informada não existe.'];
        }catch(\Exception $e){
            DB::rollback();
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }

}