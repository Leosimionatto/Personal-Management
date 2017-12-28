<?php

namespace App\Services;

use App\Models\Participant;

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
     * Method to find participant by Token
     *
     * @param $token
     * @return mixed
     */
    public function findByToken($token)
    {
        return $this->repository->all()->where('token', '=', $token)->first();
    }

}