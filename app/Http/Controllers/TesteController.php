<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function index(int $p1, int $p2){
    //echo "A soma de $p1 + $p2 é: ".($p1+$p2);
    //return view('site.teste.index', ['x'=>$p1, 'y'=>$p2]); array associativo

    //return view('site.teste.index', compact('p1', 'p2')); //cria um array associativo em que o 
    //indice sera o nome da variavel

    return view('site.teste.index')->with('p1', $p1)->with('p2', $p2);
       }
}
