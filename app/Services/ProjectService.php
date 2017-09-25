<?php

namespace App\Service;

use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectService{

    protected $project;

    public function __construct(Projects $project)
    {
        $this->project = $project;
    }

    public function all(Request $request)
    {
        return $this->project->all();
    }

    public function get($id)
    {
        return $this->project->find($id);
    }
}