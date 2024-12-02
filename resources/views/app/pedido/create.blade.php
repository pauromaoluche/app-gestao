@extends('app.layout.app')
@section('titulo', 'Pedidos')
@section('conteudo')
    <h3>Produto</h3>

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Pedido - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li><a href="">consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right:auto;">
                @component('app.pedido._components.form_create_edit', ['clientes' => $clientes])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
