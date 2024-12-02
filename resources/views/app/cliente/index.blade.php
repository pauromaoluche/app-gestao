@extends('app.layout.app')
@section('titulo', 'Cliente')
@section('conteudo')
    <h3>Fornecedor</h3>

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Clientes - Listar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="">consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left:auto; margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $item)
                            <tr>
                                <td>{{ $item->nome }}</td>
                                <td><a href="{{ route('cliente.show', ['produto' => $item->id]) }}">Ver</a></td>
                                <td><a href="{{ route('cliente.edit', ['produto' => $item->id]) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{ $item->id }}" method="POST"
                                        action="{{ route('cliente.destroy', ['produto' => $item->id]) }}">
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
                {{ $clientes->appends($request)->links() }}
                <br>
                Exibindo {{ $clientes->count() }} clientes de {{ $clientes->total() }} (de
                {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})
            </div>
        </div>
    </div>

@endsection
