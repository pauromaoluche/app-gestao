<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;
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

Route::get('/', [IndexController::class, 'index'])->name('site.index');

Route::get('/sobre-nos', [SobreNosController::class, 'index'])->name('site.sobre');

Route::get('/contato', [ContatoController::class, 'index'])->name('site.contato');

Route::post('/contato', [ContatoController::class, 'store'])->name('site.contato');

Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

Route::middleware('autenticacao:padrao')->prefix('/app')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('app.index');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
    Route::get('/clientes', function () { return 'Clientes'; })->name('app.clientes');
    Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::post('/fornecedores/listar', [FornecedorController::class, 'listar'])->name('app.fornecedores.listar');
    Route::get('/fornecedores/listar', [FornecedorController::class, 'listar'])->name('app.fornecedores.listar');
    Route::get('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedores.adicionar');
    Route::post('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedores.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', [FornecedorController::class, 'editar'])->name('app.fornecedores.editar');
    Route::get('/fornecedor/excluir/{id}', [FornecedorController::class, 'excluir'])->name('app.fornecedores.excluir');
    Route::get('/produtos', function () { return 'Produtos';})->name('app.produtos');
});


//Caso passe interrogacao no final do parametro,
//ele vira opcional, lembrar de definar um valor
//padrao caso ele nao seja recebido

Route::get(
    '/contato/{nome}/{categoria_id?}',
    function (
        string $nome = 'Desconhecido',
        int $categoria_id = 1,
    ) {
        echo "Estamos aqui: .$nome - $categoria_id";
    }
)->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');
//esse where define com o categoria_id deve ser algo enre 0 e 9,
//e precisa pelo menos ter 1 numero
//tambem define que o parametro nome tem que estar entre A a Z

Route::get('/rota1', function () {
    echo " Rota 1";
})->name('site.rota1');

Route::get('/rota2', function () {
    return redirect()->route('site.rota1');
})->name('site.rota2');

//Passo a rota de acesso e pra qual rota sera direcionada
Route::redirect('/rota2', '/rota1');

Route::get('/teste/{p1}/{p2}', [TesteController::class, 'index'])->name('teste');

Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="' . route('site.index') . '">Clique aqui para ir para página inicial</a>';
});
