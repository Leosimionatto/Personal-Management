<?php

namespace App\Modules\Usuarios\Http\Controllers;

use App\Service\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProjectController extends Controller{

    protected $project;

    public function __construct(ProjectService $project)
    {
        $this->project = $project;
    }

    public function index(Request $request)
    {
        $projects = $this->project->all($request);

        return view('usuarios::projects.index', compact('projects'));
    }

    public function add()
    {
        return view('usuarios::projects.new-project');
    }

    public function store(Request $request)
    {
        echo '<pre>';print_r($request->all());exit;
    }
}