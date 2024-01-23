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
    @isset($fornecedores[0]['cnpj'])
        CNPJ: {{ $fornecedores[0]['cnpj'] }}
        @empty($fornecedores[0]['cnpj'])
            - VAZIO
        @endempty
    @endisset
@endisset