@extends('app.layout.app')
@section('titulo', 'Pedidos Produtos')
@section('conteudo')
    <h3>Produto Produto</h3>

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produto Produto - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li><a href="">consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <h4>Detalhes do pedido</h4>
            <p>ID do pedido : {{ $pedido->id }}</p>
            <p>Cliente : {{ $pedido->cliente_id }}</p>
            <div style="width: 30%; margin-left:auto; margin-right:auto;">
                <h4>Itens do pedido</h4>
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID produto</th>
                            <th>Nome do produto</th>
                            <th>Data de inclusão do item pedido</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nome }}</td>
                                <td>{{ $item->pivot->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @component('app.pedido_produto._components.form_create_edit', ['pedido' => $pedido, 'produtos' => $produtos])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
