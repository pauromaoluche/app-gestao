<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;

class IndexController extends Controller
{

   public function index()
   {

      $motivo_contatos = MotivoContato::all();

      return view('site.index.index', ['motivo_contatos' => $motivo_contatos]);
   }
}
