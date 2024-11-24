@extends('app.layout.app')
@section('titulo', 'Fornecedores')
@section('conteudo')
    <h3>Fornecedor</h3>

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Listar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedores.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedores') }}">consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left:auto; margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>Uf</th>
                            <th>Email</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fornecedores as $item)
                            <tr>
                                <td>{{ $item->nome }}</td>
                                <td>{{ $item->site }}</td>
                                <td>{{ $item->uf }}</td>
                                <td>{{ $item->email }}</td>
                                <td><a href="{{ route('app.fornecedores.editar', $item->id) }}">Editar</a></td>
                                <td><a href="{{ route('app.fornecedores.excluir', $item->id) }}">Excluir</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $fornecedores->appends($request)->links() }}
                <br>
                Exibindo {{ $fornecedores->count() }} fornecedores de {{ $fornecedores->total() }} (de
                {{ $fornecedores->firstItem() }} a {{ $fornecedores->lastItem() }})
            </div>
        </div>
    </div>

@endsection
