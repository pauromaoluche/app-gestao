@extends('app.layout.app')
@section('titulo', 'Pedidos produtos')
@section('conteudo')
    <h3>Pedidos produtos</h3>

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>pedidos produtos - Listar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                <li><a href="">consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left:auto; margin-right:auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID pedido</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos_produtos as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->cliente_id }}</td>
                                <td><a href="{{ route('pedido-produto.create', ['pedido' => $item->id]) }}">Adicionar produtos</a></td>
                                <td><a href="{{ route('pedido.show', ['pedido' => $item->id]) }}">Ver</a></td>
                                <td><a href="{{ route('pedido.edit', ['pedido' => $item->id]) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{ $item->id }}" method="POST"
                                        action="{{ route('pedido.destroy', ['pedido' => $item->id]) }}">
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
                {{ $pedidos->appends($request)->links() }}
                <br>
                Exibindo {{ $pedidos->count() }} pedidos de {{ $pedidos->total() }} (de
                {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }})
            </div>
        </div>
    </div>

@endsection
