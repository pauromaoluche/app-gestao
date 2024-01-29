<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\MotivoContato;
use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Http\Request;

class ContatoController extends Controller
{

    public function index(Request $request)
    {
        $motivo_contatos = MotivoContato::all();

        return view('site.contato.index', ['motivo_contatos' => $motivo_contatos]);
    }

    public function store(Request $request)
    {

        //validando para os dados serem obrigatorios
        $request->validate(
            [
                'nome' => 'required|min:3|max:40',
                'telefone' => 'required',
                'email' => 'email',
                'motivo_contato_id' => 'required',
                'mensagem' => 'required|max:2000'
            ],
            [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome precisa ter no minimo 3 caracteres',
                'email.email' => 'O campo email precisa ser valido',
                'mensagem.max' => 'A mensagem deve ter no maximo 2000 caracteres'
            ],
        );

        Contato::create($request->all());

        // $contato = new Contato();
        // $contato->fill($request->all());
        // $contato->save();

        return redirect()->route('site.index');
    }
}
