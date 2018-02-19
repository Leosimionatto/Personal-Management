<?php

namespace App\Services;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserService{

    /**
     * @var User
     */
    protected $user;

    /**
     * @var Message
     */
    protected $message;

    /**
     * UserService constructor.
     *
     * @param User $user
     * @param Message $message
     */
    public function __construct(User $user, Message $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    /**
     * Method to find User by Email
     *
     * @param string $email
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findByEmail($email)
    {
        return $this->user->all()->where('email', '=', $email)->first();
    }

    /**
     * Method to get all Conversations
     *
     * @param $id
     * @return mixed
     */
    public function getConversations($id)
    {
        $array = [];
        $result = [];

        $conversations['issuers'] = Message::select(DB::raw('DISTINCT(idemitente), iddestinatario'))->where('idemitente', '!=', $id)->where('iddestinatario', '=', $id)->get();

        foreach($conversations['issuers'] as $issuer){
            $array[] = $issuer->idemitente;
        }

        $conversations['recipients'] = Message::select(DB::raw('DISTINCT(iddestinatario), idemitente'))->where('iddestinatario', '!=', $id)->where('idemitente', '=', $id)->whereNotIn('iddestinatario', $array)->get();

        if(count($conversations['issuers']) > 0 && count($conversations['recipients']) > 0){
            $result = $conversations['issuers']->push($conversations['recipients']);
        }

        if(count($conversations['issuers']) > 0){
            $result = $conversations['issuers'];
        }

        if(count($conversations['recipients']) > 0){
            $result = $conversations['recipients'];
        }

        return $result;
    }

    /**
     * Method to get User messages with passed User
     *
     * @param $id
     * @return mixed
     */
    public function messagesWithAnotherUser($id)
    {
        $userid = Auth::guard('user')->user()->id;

        return Message::where(function($query) use ($userid){
            $query->where('idemitente', '=', $userid);
            $query->orWhere('iddestinatario', '=', $userid);
        })->where(function($query) use ($id){
            $query->where('idemitente', '=', $id);
            $query->orWhere('iddestinatario', '=', $id);
        })->orderBy('id')->get();
    }
}