<?php

namespace App\Services;

use App\Models\ProjectType;

class ProjectTypeService{

    /**
     * @var ProjectType
     */
    protected $type;

    /**
     * ProjectTypeService constructor.
     *
     * @param ProjectType $type
     */
    public function __construct(ProjectType $type)
    {
        $this->type = $type;
    }

    /**
     * Method to get all Project Types
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->type->all();
    }

}