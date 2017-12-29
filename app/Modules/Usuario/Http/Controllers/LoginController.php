<?php

namespace App\Modules\Usuario\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{

    /**
     * Method to show Login Form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if(!empty(Auth::guard('user')->user())){
            return redirect()->route('index');
        }

        return view('usuario::login.index');
    }

    /**
     * Method to create User Session
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function auth(Request $request)
    {
        $user = [
            'email' => $request->get('email'),
            'password' => $request->get('senha')
        ];

        if(Auth::guard('user')->attempt($user)){
            return redirect()->route('index');
        }

        return redirect()->back()->withErrors(['As credenciais estão incorretas.'])->withInput($request->all());
    }

    /**
     * Method to logout an User
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard('user')->logout();

        return redirect()->to('usuario/login');
    }
}