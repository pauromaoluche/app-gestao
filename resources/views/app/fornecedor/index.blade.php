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
    <br>
    Fornecedor: {{ $fornecedores[0]['nome'] }}
    <br>
    Status: {{ $fornecedores[0]['status'] }}
    <br>
    CNPJ: {{ $fornecedores[1]['cnpj'] ?? 'valor nao esta definida' }}
    {{-- Se a variavel testada nao estiver definida ou tiver valor null, ele usa o valor defautl --}}
    <br>
    Telefone: {{ $fornecedores[1]['ddd']?? '' }} {{$fornecedores[1]['telefone'] ?? ''}}

    @switch($fornecedores[1]['ddd'])
        @case('85')
            <h3>São Paulo</h3>
            @break
        @case('11')
            <h3>Juiz de fora</h3>
        @break
        @case('43')
            <h3>Parana</h3>
        @break
        @default
            <h3>Estado não definido</h3>
    @endswitch
@endisset