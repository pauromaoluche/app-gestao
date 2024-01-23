<h3>Fornecedor</h3>

{{ 'Texto de teste' }}

{{-- Comentario blade --}}

@php
    // if(){

    // }elseif(){

    // }else{

    // }
@endphp

{{-- dump and die --}}
{{-- @dd($fornecedores) --}}

{{-- @if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existe varios fornecedores cadastrados</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados</h3>
@endif --}}

@if ($fornecedores[0]['status'] == 'S')
    <h3>Fornecedor Inativo</h3>
@endif
<br>
@unless ($fornecedores[0]['status'] == 'S') {{-- verifica se o retorno da condição é falso --}}
    <h3>Fornecedor inativo unless</h3>
@endunless
