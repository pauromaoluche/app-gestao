@extends('app.layout.app')
@section('titulo', 'Fornecedores')
@section('conteudo')
    <h3>Visualizar produto</h3>

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Visualizar produtor</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produtos.index') }}">Voltar</a></li>
                <li><a href="">consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right:auto;">
                <table border="1" style="text-align: left">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $produto->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td>{{ $produto->nome }}</td>
                    </tr>
                    <tr>
                        <td>Descrição:</td>
                        <td>{{ $produto->descricao }}</td>
                    </tr>
                    <tr>
                        <td>Peso:</td>
                        <td>{{ $produto->peso }} kg</td>
                    </tr>
                    <tr>
                        <td>Unidade de medida:</td>
                        <td>{{ $produto->unidade_id }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
