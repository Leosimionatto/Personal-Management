<?php

namespace App\Modules\Usuario\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Service\ProjectService;
use App\Service\TechnologyService;
use App\Services\ParticipantService;
use App\Services\ProjectTypeService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProjectController extends Controller{

    /**
     * @var ProjectService
     */
    protected $project;

    /**
     * @var TechnologyService
     */
    protected $technologyService;

    /**
     * @var ProjectTypeService
     */
    protected $projectTypeService;

    /**
     * @var ParticipantService
     */
    protected $participantService;

    /**
     * ProjectController constructor.
     *
     * @param ProjectService $project
     * @param TechnologyService $technologyService
     * @param ProjectTypeService $projectTypeService
     * @param ParticipantService $participantService
     */
    public function __construct(ProjectService $project, TechnologyService $technologyService, ProjectTypeService $projectTypeService, ParticipantService $participantService)
    {
        $this->project = $project;
        $this->technologyService = $technologyService;
        $this->projectTypeService = $projectTypeService;
        $this->participantService = $participantService;
    }

    /**
     * Method to list projects
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $projects = $this->project->all($request);

        return view('usuario::projects.index', compact('projects'));
    }

    /**
     * Method to add project
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $technologies = $this->technologyService->all();
        $types = $this->projectTypeService->all();

        return view('usuario::projects.create', compact('technologies', 'types'));
    }

    /**
     * Method to show project information
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $project = $this->project->get($id);

        return view('usuario::projects.show', compact('project'));
    }

    /**
     * Method to insert project in database
     *
     * @param StoreProjectRequest $request
     * @return array
     */
    public function store(StoreProjectRequest $request)
    {
        return $this->project->add($request->all());
    }

    /**
     * Method to show/edit project information
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function management($id)
    {
        $project = $this->project->get($id);

        return view('usuario::projects.management', compact('project'));
    }

    /**
     * Method to show Project Participation Request
     *
     * @param $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function request($token)
    {
        $participant = $this->participantService->findByToken($token);

        return view('usuario::projects.request.participation', compact('participant', 'token'));
    }

    /**
     * Method to update an Project Participation Request
     *
     * @param Request $request
     * @return array
     */
    public function updateRequest(Request $request)
    {
        return $this->participantService->participate($request->all());
    }
}