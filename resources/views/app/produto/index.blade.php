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
                <li><a href="{{ route('produtos.create') }}">Novo</a></li>
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
                            <th>comprimento</th>
                            <th>largura</th>
                            <th>altura</th>
                            <th></th>
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
                                <td>{{ $item->comprimento ?? '' }}</td>
                                <td>{{ $item->largura ?? '' }}</td>
                                <td>{{ $item->altura ?? '' }}</td>
                                <td><a href="{{ route('produtos.show', ['produto' => $item->id]) }}">Ver</a></td>
                                <td><a href="{{ route('produtos.edit', ['produto' => $item->id]) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{ $item->id }}" method="POST"
                                        action="{{ route('produtos.destroy', ['produto' => $item->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $item->id }}').submit()">Excluir</a>
                                </td>
                                </form>
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
