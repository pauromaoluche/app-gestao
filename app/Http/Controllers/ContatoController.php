<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index(Request $request){
       

        // $contato = new Contato();
        // $contato->name = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');

        //print_r($contato->getAttributes());
        //$contato->save();
        $contato = new Contato();
        $contato->fill($request->all());
        $contato->save();
        return view('site.contato.index');

       }
}
