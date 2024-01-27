<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index(Request $request)
    {

        $motivo_contatos = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação',
        ];

        return view('site.contato.index', ['motivo_contatos' => $motivo_contatos]);
    }

    public function store(Request $request)
    {

        //validando para os dados serem obrigatorios
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000'
        ]);

        Contato::create($request->all());

        // $contato = new Contato();
        // $contato->fill($request->all());
        // $contato->save();
    }
}
