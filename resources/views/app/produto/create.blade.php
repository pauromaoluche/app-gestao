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
                <form method="POST" action="{{ route('produtos.store') }}">
                    @csrf
                    <input type="text" name="nome" value="{{ old('nome') }}" placeholder="Nome" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                    <input type="text" name="descricao" value="{{ old('descricao') }}" placeholder="descricao"
                        class="borda-preta">
                    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
                    <input type="text" name="peso" value="{{ old('peso') }}" placeholder="peso" class="borda-preta">
                    {{ $errors->has('peso') ? $errors->first('peso') : '' }}
                    <select name="unidade_id">
                        <option>Selecione</option>
                        @foreach ($unidades as $item)
                            <option value="{{ $item->id }} {{ old('unidade_id') == $item->id ? 'selected' : '' }}">
                                {{ $item->descricao }}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
