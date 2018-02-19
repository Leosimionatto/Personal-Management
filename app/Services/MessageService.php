<?php

namespace App\Services;

use App\Events\ChatMessageEvent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageService{

    /**
     * @var Message
     */
    protected $message;

    /**
     * @var User
     */
    protected $user;

    /**
     * MessageService constructor.
     *
     * @param Message $message
     * @param User $user
     */
    public function __construct(Message $message, User $user)
    {
        $this->message = $message;
        $this->user = $user;
    }

    /**
     * Method to send an Message
     *
     * @param $data
     * @return array
     */
    public function send($data)
    {
        DB::beginTransaction();
        try{
            $target = $this->user->find($data['id']);

            $post = [
                'idemitente' => Auth::guard('user')->user()->id,
                'iddestinatario' => $data['id'],
                'conteudo' => $data['conteudo'],
                'criado_em' => date('Y-m-d H:i:s'),
                'atualizado_em' => date('Y-m-d H:i:s')
            ];

            $new = $this->message->create($post);

            if(!empty($new->id)){
                event(new ChatMessageEvent($target));

                DB::commit();
                return ['status' => '00', 'message' => $new->conteudo];
            }

            DB::rollback();
            return ['status' => '01', 'message' => 'Ocorreu um erro! Caso o erro persista, favor entrar em contato com o administrador.'];
        }catch(\Exception $e){
            DB::rollback();
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }

}