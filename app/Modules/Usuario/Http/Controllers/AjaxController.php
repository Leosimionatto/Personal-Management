<?php

namespace App\Modules\Usuario\Http\Controllers;

use App\Services\ParticipantService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AjaxController extends Controller{

    /**
     * @var ParticipantService
     */
    protected $participantService;

    /**
     * AjaxController constructor.
     *
     * @param ParticipantService $participantService
     */
    public function __construct(ParticipantService $participantService)
    {
        $this->participantService = $participantService;
    }

    /**
     * Method to call and get Confirm Modal
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function confirm()
    {
        return response()->json(['html' => view('usuario::ajax.confirm')->render()]);
    }

    /**
     * Method to call and get Recuse Modal
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function recuse()
    {
        return response()->json(['html' => view('usuario::ajax.recuse')->render()]);
    }

    /**
     * Method to call and get Edit Participation Modal
     *
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editParticipation(Request $request)
    {
        $participant = $this->participantService->findByUser($request->get('id'));

        return response()->json(['html' => view('usuario::ajax.edit-participation', compact('participant'))->render()]);
    }

}