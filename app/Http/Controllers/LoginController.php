<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('site.login.index', ['titulo' => 'Login']);
    }

    public function autenticar(Request $request){
        
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O campo usuario (e-mail) é obrigatorio',
            'senha.required' => 'O campo senha é obrigatorio'
        ];

        $request->validate($regras, $feedback);

    }
}
