<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{

    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->paginate(5);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request)
    {
        $msg = '';

        if ($request->input('_token') != '' && $request->input('id') == '') {

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
        } elseif ($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));

            $update = $fornecedor->update($request->all());
            if ($update) {
                $msg = "Cadastro atualizado com sucesso";
            } else {
                $msg = "Erro ao atualizar o registro";
            }

            return redirect()->route('app.fornecedores.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = '')
    {
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }
}
