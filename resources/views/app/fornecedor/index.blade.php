@extends('app.layout.app')
@section('titulo', 'Fornecedores')
@section('conteudo')
    <h3>Fornecedor</h3>

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedores.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedores') }}">consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right:auto; padding-top:20px">
            <form method="POST" action="{{ route('app.fornecedores.listar') }}">
                @csrf
                <input type="text" name="nome" placeholder="Nome" class="borda-preta">
                <input type="text" name="site" placeholder="Site" class="borda-preta">
                <input type="text" name="uf" placeholder="UF" class="borda-preta">
                <input type="text" name="email" placeholder="Email" class="borda-preta">
                <button type="submit" class="borda-preta">Pesquisar</button>
            </form>
            </div>
        </div>
    </div>

@endsection
