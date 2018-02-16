<?php

namespace App\Modules\Usuario\Http\Controllers;

use App\Services\ParticipantService;
use App\Services\PostService;
use App\Services\StepService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AjaxController extends Controller
{

    /**
     * @var ParticipantService
     */
    protected $participantService;

    /**
     * @var PostService
     */
    protected $postService;

    /**
     * @var StepService
     */
    protected $stepService;

    /**
     * AjaxController constructor.
     *
     * @param ParticipantService $participantService
     * @param PostService $postService
     * @param StepService $stepService
     */
    public function __construct(ParticipantService $participantService, PostService $postService, StepService $stepService)
    {
        $this->participantService = $participantService;
        $this->postService = $postService;
        $this->stepService = $stepService;
    }

    /**
     * Method to call and get Confirm Modal
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function confirm()
    {
        return response()->json(['html' => view('usuario::ajax.participation.confirm')->render()]);
    }

    /**
     * Method to call and get Recuse Modal
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function recuse()
    {
        return response()->json(['html' => view('usuario::ajax.participation.recuse')->render()]);
    }

    /**
     * Method to call and get Edit Participation Modal
     *
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editParticipation(Request $request)
    {
        $participant = $this->participantService->find($request->get('id'));
        $posts = $this->postService->all();

        return response()->json(['html' => view('usuario::ajax.participation.edit-participation', compact('participant', 'posts'))->render()]);
    }

    /**
     * Method to call and get Cancel Participation Modal
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function cancelParticipation(Request $request)
    {
        $participant = $this->participantService->find($request->get('id'));

        return response()->json(['html' => view('usuario::ajax.participation.cancel-participation', compact('participant'))->render()]);
    }

    /**
     * Method to call and get Add Participant Modal
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function addParticipant()
    {
        $posts = $this->postService->all();

        return response()->json(['html' => view('usuario::ajax.participant.add-participant', compact('posts'))->render()]);
    }

    /**
     * Method to call and get Edit Participant Modal
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editParticipant(Request $request)
    {
        $posts = $this->postService->all();
        $participant = $this->participantService->find($request->get('id'));

        return response()->json(['html' => view('usuario::ajax.participant.edit-participant', compact('posts', 'participant'))->render()]);
    }

    /**
     * Method to call and get Step Information Template
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function stepInformation($id)
    {
        $step = $this->stepService->get($id);
        
        return response()->json(['html' => view('usuario::ajax.step.step-information', compact('step'))->render(), 'code' => $step->idsituacao]);
    }

    /**
     * Method to call and get Edit Step Modal
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editStep($id, Request $request)
    {
        $step = $this->stepService->get($id);
        $situation = $request->get('situacao');

        return response()->json(['html' => view('usuario::ajax.step.edit-step', compact('step', 'situation'))->render()]);
    }

    /**
     * Method to call and get Add Step Comment Modal
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function createComment($id)
    {
        $step = $this->stepService->get($id);

        $participants = $step->task->project->participants->where('idgrupo', '!=', 2);

        return response()->json(['html' => view('usuario::ajax.step.create-comment', compact('step', 'participants'))->render()]);
    }

    /**
     * Method to call and get Update Time Spent Modal
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateTimeSpent($id)
    {
        $step = $this->stepService->get($id);

        return response()->json(['html' => view('usuario::ajax.step.update-time-spent', compact('step'))->render()]);
    }
}