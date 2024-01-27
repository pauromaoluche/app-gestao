<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
   public function index(){

      $motivo_contatos = [
         '1' => 'Dúvida',
         '2' => 'Elogio',
         '3' => 'Reclamação',
     ];
     
    return view('site.index.index', ['motivo_contatos' => $motivo_contatos]);
   }
}
