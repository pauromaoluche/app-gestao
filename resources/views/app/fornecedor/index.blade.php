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
    @php
        $i = 0;
    @endphp
    @while (isset($fornecedores[$i]))
        <br>
        Fornecedor: {{ $fornecedores[0]['nome'] }}
        <br>
        Status: {{ $fornecedores[0]['status'] }}
        <br>
        CNPJ: {{ $fornecedores[1]['cnpj'] ?? 'valor nao esta definida' }}
        {{-- Se a variavel testada nao estiver definida ou tiver valor null, ele usa o valor defautl --}}
        <br>
        Telefone: {{ $fornecedores[1]['ddd'] ?? '' }} {{ $fornecedores[1]['telefone'] ?? '' }}
        <hr>
        @php
            $i++;
        @endphp
    @endwhile
@endisset
<br>
