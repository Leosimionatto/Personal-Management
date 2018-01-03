<?php

namespace App\Services;

use App\Models\Participant;
use App\Notifications\ParticipationRequestAnswerNotification;
use Illuminate\Support\Facades\DB;

class ParticipantService{

    /**
     * @var Participant
     */
    protected $repository;

    /**
     * ParticipantService constructor.
     *
     * @param Participant $repository
     */
    public function __construct(Participant $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Method to edit an Participate
     *
     * @param $data
     * @return array
     */
    public function edit($data)
    {
        DB::beginTransaction();
        try{
            $id = $data['id'];

            unset($data['id']);

            if($this->repository->find($id)->update($data)){
                DB::commit();
                return ['status' => '00'];
            }

            DB::rollback();
            return ['status' => '01', 'message' => 'Ocorreu um erro! Caso o erro persista, contate um administrador.'];
        }catch(\Exception $e){
            DB::rollback();
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }

    /**
     * Method to get Participant by User id
     *
     * @param $id
     * @return mixed
     */
    public function findByUser($id)
    {
        return $this->repository->all()->where('idusuario', '=', $id)->first();
    }

    /**
     * Method to find all Participants by Project id
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getParticipantsByProject($id)
    {
        return $this->repository->all()->where('idprojeto', '=', $id);
    }

    /**
     * Method to find participant by Token
     *
     * @param $token
     * @return mixed
     */
    public function findByToken($token)
    {
        return $this->repository->all()->where('token', '=', $token)->first();
    }

    /**
     * Method to update Project Participation Request
     *
     * @param $data
     * @return array
     */
    public function participate($data)
    {
        DB::beginTransaction();
        try{
            $participant = $this->findByToken($data['token']);

            unset($data['token']);

            if($participant->update($data)){
                $participant->user->notify(new ParticipationRequestAnswerNotification($participant));
            }

            DB::commit();
            return ['status' => '00', 'id' => $participant->idprojeto];
        }catch(\Exception $e){
            DB::rollback();
            return ['status' => '01', 'message' => $e->getMessage()];
        }
    }
}