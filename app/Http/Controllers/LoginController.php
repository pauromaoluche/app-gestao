<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('site.login.index', ['titulo' => 'Login']);
    }

    public function autenticar(Request $request)
    {

        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O campo usuario (e-mail) é obrigatorio',
            'senha.required' => 'O campo senha é obrigatorio'
        ];

        $email = $request->get('usuario');
        $senha = $request->get('senha');

        echo "Usuario: $email | Senha: $senha";
        echo "<br>";

        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $senha)->get()->first();

        if(isset($usuario->name)){
            echo "Usuario existe";
        }else{
            echo "Usuario nao existe";
        }

        echo "<pre>";
        print_r($usuario);
        echo "</pre>";

        $request->validate($regras, $feedback);
    }
}
