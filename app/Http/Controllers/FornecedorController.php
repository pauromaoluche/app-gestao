<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{

    public function index()
    {
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1',
                'status' => 'N',
                'cnpj' => '',
                'ddd' => '11',
                'telefone' => '0000-000'
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '85',
                'telefone' => '0000-000'
            ],
            2 => [
                'nome' => 'Fornecedor 3',
                'status' => 'S',
                'cnpj' => '18484',
                'ddd' => '43',
                'telefone' => '0000-000'
            ]
        ];

        return view('app.fornecedor.index', compact('fornecedores'));
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->get();

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $request)
    {
        $msg = '';

        if ($request->input('_token') != '') {

            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'min' => 'O campo :attribute deve ter no :min caracteres',
                'max' => 'O campo :attribute deve ter no :max caracteres',
                'email.email' => 'Email invalido'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'cadastro realizado com sucesso';
        }
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
}
