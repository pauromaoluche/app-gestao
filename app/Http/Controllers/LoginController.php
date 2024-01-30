<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {

        $erro = '';

        if($request->get('erro') == 1){
            $erro = 'Usuario ou senha não existem';
        }
        return view('site.login.index', ['titulo' => 'Login', 'erro' => $erro]);
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
            return redirect()->route('site.login', ['erro' => 1]);
        }

        echo "<pre>";
        print_r($usuario);
        echo "</pre>";

        $request->validate($regras, $feedback);
    }
}
