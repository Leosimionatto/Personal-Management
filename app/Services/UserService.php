<?php

namespace App\Services;

use App\Models\Message;
use App\Models\User;

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
        $conversations['issuers'] = Message::distinct('idemitente')->where('idemitente', '!=', $id)->get();

        foreach($conversations['issuers'] as $issuer){
            $array[] = $issuer->idemitente;
        }

        $conversations['recipients'] = Message::distinct('iddestinatario')->where('iddestinatario', '!=', $id)->whereNotIn('iddestinatario', $array)->get();

        $result = $conversations['issuers']->merge($conversations['recipients']);

        return $result;
    }
}