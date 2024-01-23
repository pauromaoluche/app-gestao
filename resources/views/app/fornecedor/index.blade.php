<h3>Fornecedor</h3>
{{ 'Texto de teste' }}

@php
    // if(){
    // }elseif(){
    // }else{
    // }
@endphp

@if ($fornecedores > 0 && $fornecedores < 10)
    <h3>Temos alguns fornecedores</h3>
@elseif ($fornecedores > 10)
    <h3>Temos muitos fornecedores</h3>
@else
    <h3>Não temos nenhum fornecedor</h3>
@endif

@isset($fornecedores)
    @forelse ($fornecedores as $indice => $fornecedor)
        {{-- @dd($loop)     --}}

        Interação atual: {{ $loop->iteration }}
        <br>
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'valor nao esta definida' }}
        {{-- Se a variavel testada nao estiver definida ou tiver valor null, ele usa o valor defautl --}}
        <br>
        Telefone: {{ $fornecedor['ddd'] ?? '' }} {{ $fornecedor['telefone'] ?? '' }}
        <br>
        @if ($loop->first)
            Primeira interação do loop
        @endif
        @if ($loop->last)
            Ultima interação do loop
            <br>
            Total de registros: {{ $loop->count }}
        @endif
        <hr>
    @empty
        Não Existem fornecedores cadastrados!!!
    @endforelse
@endisset
<br>
