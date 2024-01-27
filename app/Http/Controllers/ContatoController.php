<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index(Request $request)
    {
        return view('site.contato.index');
    }

    public function store(Request $request)
    {

        //validando para os dados serem obrigatorios
        $request->validade([
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contato' => 'motivo_contato',
            'mensagem' => 'mensagem'
        ]);

        Contato::create($request->all());

        // $contato = new Contato();
        // $contato->fill($request->all());
        // $contato->save();
    }
}
