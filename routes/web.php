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

Route::get('/login', function(){
    return 'Login';
});

Route::prefix('/app')->group(function(){
    Route::get('/clientes',function(){
        return 'Clientes';
    });
    Route::get('/fornacedores',function(){
        return 'Fornecedores';
    });
    Route::get('/produtos',function(){
        return 'Produtos';
    });
});


//Caso passe interrogacao no final do parametro,
//ele vira opcional, lembrar de definar um valor
//padrao caso ele nao seja recebido

Route::get(
    '/contato/{nome}/{categoria_id?}',
    function(
        string $nome = 'Desconhecido',
        int $categoria_id = 1,
        ){
    echo "Estamos aqui: .$nome - $categoria_id";
})->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');
//esse where define com o categoria_id deve ser algo enre 0 e 9,
//e precisa pelo menos ter 1 numero
//tambem define que o parametro nome tem que estar entre A a Z