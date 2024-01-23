<h3>Fornecedor</h3>

{{ 'Texto de teste' }}

@php
    // if(){

    // }elseif(){

    // }else{

    // }
@endphp

@isset($fornecedores)
    <br>
    Fornecedor: {{ $fornecedores[0]['nome'] }}
    <br>
    Status: {{ $fornecedores[0]['status'] }}
@endisset