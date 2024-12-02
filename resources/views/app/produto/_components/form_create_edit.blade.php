@if (isset($produto->id))
    <form method="POST" action="{{ route('produtos.update', ['produto' => $produto->id]) }}">
        @csrf
        @method('put')
    @else
        <form method="POST" action="{{ route('produtos.store') }}">
            @csrf
@endif
<select name="fornecedor_id">
    <option>Selecione o fornecedor</option>
    @foreach ($fornecedores as $item)
        <option value="{{ $item->id }}"
            {{ ($produto->fornecedor_id ?? old('fornecedor_id')) == $item->id ? 'selected' : '' }}>
            {{ $item->nome }}</option>
    @endforeach
</select>
{{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}
<input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
{{ $errors->has('nome') ? $errors->first('nome') : '' }}
<input type="text" name="descricao" value="{{ $produto->descricao ?? old('descricao') }}" placeholder="descricao"
    class="borda-preta">
{{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
<input type="text" name="peso" value="{{ $produto->peso ?? old('peso') }}" placeholder="peso"
    class="borda-preta">
{{ $errors->has('peso') ? $errors->first('peso') : '' }}
<select name="unidade_id">
    <option>Selecione</option>
    @foreach ($unidades as $item)
        <option value="{{ $item->id }}"
            {{ ($produto->unidade_id ?? old('unidade_id')) == $item->id ? 'selected' : '' }}>
            {{ $item->descricao }}</option>
    @endforeach
</select>
{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
<button type="submit" class="borda-preta">Cadastrar</button>
</form>
