<?php

namespace App\Modules\Usuario\Http\Controllers;

use Illuminate\Routing\Controller;

class AjaxController extends Controller{

    /**
     * Method to call and get Confirm Modal
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function confirm()
    {
        return response()->json(['html' => view('usuario::ajax.confirm')->render()]);
    }

}