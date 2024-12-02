<form method="POST" action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}">
    @csrf
    <select name="produto_id">
        <option>Selecione um produto</option>
        @foreach ($produtos as $item)
            <option value="{{ $item->id }}"
                {{ old('produto_id') == $item->id ? 'selected' : '' }}>
                {{ $item->nome }}</option>
        @endforeach
    </select>
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

    {{-- <select name="cliente_id">
        <option>Selecione</option>
        @foreach ($clientes as $item)
            <option value="{{ $item->id }}"
                {{ ($pedido->cliente_id ?? old('cliente_id')) == $item->id ? 'selected' : '' }}>
                {{ $item->nome }}</option>
        @endforeach
    </select>
    {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }} --}}
    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
