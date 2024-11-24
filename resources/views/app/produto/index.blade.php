@extends('app.layout.app')
@section('titulo', 'Produtos')
@section('conteudo')
    <h3>Fornecedor</h3>

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produtos - Listar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="">Novo</a></li>
                <li><a href="">consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left:auto; margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>descrição</th>
                            <th>peso</th>
                            <th>unidade_id</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $item)
                            <tr>
                                <td>{{ $item->nome }}</td>
                                <td>{{ $item->descricao }}</td>
                                <td>{{ $item->peso }}</td>
                                <td>{{ $item->unidade_id }}</td>
                                <td><a href="{{ route('app.fornecedores.editar', $item->id) }}">Editar</a></td>
                                <td><a href="{{ route('app.fornecedores.excluir', $item->id) }}">Excluir</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $produtos->appends($request)->links() }}
                <br>
                Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }} (de
                {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})
            </div>
        </div>
    </div>

@endsection
