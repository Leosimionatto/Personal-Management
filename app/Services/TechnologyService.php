<?php

namespace App\Service;

use App\Models\Technologies;

class TechnologyService{

    /**
     * @var Technologies
     */
    protected $technologies;

    /**
     * TechnologyService constructor.
     *
     * @param Technologies $technologies
     */
    public function __construct(Technologies $technologies)
    {
        $this->technologies = $technologies;
    }

    /**
     * Method to get all registered technologies
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->technologies->all();
    }

}