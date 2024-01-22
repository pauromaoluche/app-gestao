<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SobreNosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index']);

Route::get('/sobre-nos', [SobreNosController::class, 'index']);

Route::get('/contato',[ContatoController::class, 'index']);

Route::get('/contato/{nome}', function(string $nome){
    echo 'Estamos aqui: '.$nome;
});