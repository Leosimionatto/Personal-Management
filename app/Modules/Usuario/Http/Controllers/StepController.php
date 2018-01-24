<?php

namespace App\Modules\Usuario\Http\Controllers;

use App\Services\StepService;
use Illuminate\Routing\Controller;

class StepController extends Controller{

    /**
     * @var StepService
     */
    protected $stepService;

    /**
     * StepController constructor.
     *
     * @param StepService $stepService
     */
    public function __construct(StepService $stepService)
    {
        $this->stepService = $stepService;
    }
}