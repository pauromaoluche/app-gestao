@extends('app.layout.app')
@section('titulo', 'Fornecedores')
@section('conteudo')
    <h3>Produto</h3>

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produto - Adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produtos.index') }}">Voltar</a></li>
                <li><a href="">consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right:auto;">
                <form method="POST" action="">
                    @csrf
                    <input type="text" name="nome" value="" placeholder="Nome" class="borda-preta">
                    <input type="text" name="descricao" value="" placeholder="descricao" class="borda-preta">
                    <input type="text" name="peso" value="" placeholder="peso" class="borda-preta">
                    <select name="unidade_id">
                        <option>Selecione</option>
                        @foreach ($unidades as $item)
                            <option value="{{ $item->id }}">{{ $item->descricao }}</option>
                        @endforeach

                    </select>
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection
