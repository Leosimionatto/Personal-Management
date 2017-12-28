<?php

namespace App\Modules\Usuario\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller{

    /**
     * @var UserService
     */
    protected $service;

    /**
     * UserController constructor.
     *
     * @param UserService $service
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
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

        if(count($result) > 0){
            return ['status' => '00'];
        }

        return ['status' => '01', 'message' => 'Usuário não encontrado na Base de Dados.'];
    }

}