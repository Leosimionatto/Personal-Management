<?php

namespace App\Services;

use App\Models\Step;

class StepService{

    /**
     * @var Step
     */
    protected $step;

    /**
     * StepService constructor.
     *
     * @param Step $step
     */
    public function __construct(Step $step)
    {
        $this->step = $step;
    }

    /**
     * Method to get Step Information
     *
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->step->find($id);
    }
}