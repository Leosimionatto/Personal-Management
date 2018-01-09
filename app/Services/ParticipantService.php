<?php

namespace App\Services;

use App\Mail\Participation;
use App\Models\Participant;
use App\Models\Project;
use App\Models\User;
use App\Notifications\ParticipationRequestAnswerNotification;
use App\Notifications\ParticipationRequestNotification;
use App\Utilities\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ParticipantService{

    /**
     * @var Participant
     */
    protected $repository;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var Project
     */
    protected $project;

    /**
     * ParticipantService constructor.
     *
     * @param Participant $repository
     * @param User $user
     * @param Project $project
     */
    public function __construct(Participant $repository, User $user, Project $project)
    {
        $this->repository = $repository;
        $this->user = $user;
        $this->project = $project;
    }

    /**
     * Method to get Participant by id
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Method to add an Participant
     *
     * @param $email
     * @param $id
     * @return array
     */
    public function add($email, $id)
    {
        DB::beginTransaction();
        try{
            $user = $this->user->all()->where('email', '=', $email)->first();
            $project = $this->project->find($id);

            if(!empty($user)){
                $post = [
                    'idprojeto'     => $id,
                    'idusuario'     => $user->id,
                    'criado_em'     => date('Y-m-d H:i:s'),
                    'atualizado_em' => date('Y-m-d H:i:s'),
                    'solicitapart'  => 'pen',
                    'token'         => Str::random(),
                    'fltoken'       => 's'
                ];

                $new = $this->repository->create($post);

                $post = [
                    'nmprojeto'      => $project->nmprojeto,
                    'nmparticipante' => $new->user->nome,
                    'token'          => $new->token
                ];

                Mail::to($new->user)->send(new Participation($post));

                $new->user->notify(new ParticipationRequestNotification($project));

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
     * Method to edit an Participant
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
     * Method to cancel Participation
     *
     * @param $id
     * @return array
     */
    public function cancel($id)
    {
        DB::beginTransaction();
        try{
            if($this->repository->find($id)->delete()){
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
     * Method to get all Misallocated Project Participants
     *
     * @param $id
     * @return mixed
     */
    public function getProjectMisallocatedParticipants($id)
    {
        return $this->repository->all()->where('idprojeto', '=', $id)->where('solicitapart', '=', 'ace')->where('cargo',NULL)->where('deveresdesc', NULL);
    }

    /**
     * Method to find all Participants by Project id
     *
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getParticipantsByProject($id)
    {
        return $this->repository->all()->where('idprojeto', '=', $id)->where('solicitapart', '=', 'ace');
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

    /**
     * Method to check User Participation
     *
     * @param $data
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function checkParticipation($data)
    {
        $user = $this->user->all()->where('email', '=', $data['email'])->first();

        return $this->repository->all()->where('idusuario', '=', $user->id)->where('idprojeto', '=', $data['id']);
    }
}