<?php

namespace App\Modules\Usuario\Http\Controllers;

use App\Service\ProjectService;
use App\Services\ParticipantService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller{

    /**
     * @var UserService
     */
    protected $service;

    /**
     * @var ProjectService
     */
    protected $projectService;

    /**
     * @var ParticipantService
     */
    protected $participantService;

    /**
     * UserController constructor.
     *
     * @param UserService $service
     * @param ProjectService $projectService
     * @param ParticipantService $participantService
     */
    public function __construct(UserService $service, ProjectService $projectService, ParticipantService $participantService)
    {
        $this->service = $service;
        $this->projectService = $projectService;
        $this->participantService = $participantService;
    }

    /**
     * Method to check if User exists
     *
     * @param Request $request
     * @return array
     */
    public function checkByEmail(Request $request)
    {
        $result = $this->service->findByEmail($request->get('email'));

        if(!empty($result)){
            return ['status' => '00', 'user' => $result];
        }

        return ['status' => '01', 'message' => 'Usuário não encontrado na Base de Dados.'];
    }

    /**
     * Method to check User Participation in an Project
     *
     * @param Request $request
     * @return array
     */
    public function checkParticipationByEmail(Request $request)
    {
        $result = $this->service->findByEmail($request->get('email'));

        if(!empty($result)){
            $condition = $this->participantService->checkParticipation($request->all());

            if(count($condition) > 0){
                return ['status' => '01', 'message' => 'Este usuário já é um participante.'];
            }

            return ['status' => '00', 'user' => $result];
        }

        return ['status' => '01', 'message' => 'Usuário não encontrado na Base de Dados.'];
    }

}