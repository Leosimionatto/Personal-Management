<?php

namespace App\Modules\Usuario\Http\Controllers;

use App\Services\StepService;
use Illuminate\Http\Request;
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

    /**
     * Method to update Step Situation
     *
     * @param Request $request
     * @return array
     */
    public function updateSituation(Request $request)
    {
        return $this->stepService->updateSituation($request->all());
    }
}