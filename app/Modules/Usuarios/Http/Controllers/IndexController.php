<?php

namespace App\Modules\Usuarios\Http\Controllers;

use Illuminate\Routing\Controller;

class IndexController extends Controller{
    public function index()
    {
        return view('usuarios::projetos.index');
    }
}