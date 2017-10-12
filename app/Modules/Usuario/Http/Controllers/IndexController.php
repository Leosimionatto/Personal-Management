<?php

namespace App\Modules\Usuario\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class IndexController extends Controller{

    /**
     * @var
     */
    protected $service;

    /**
     * IndexController constructor.
     */
    public function __construct()
    {
    }

    /**
     * Index Method - Application initial page
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('usuario::index.index');
    }
}