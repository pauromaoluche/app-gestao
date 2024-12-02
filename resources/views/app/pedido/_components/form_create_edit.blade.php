@if (isset($pedido->id))
    <form method="POST" action="{{ route('pedido.update', ['pedido' => $pedido->id]) }}">
        @csrf
        @method('put')
    @else
        <form method="POST" action="{{ route('pedido.store') }}">
            @csrf
@endif
<select name="cliente_id">
    <option>Selecione</option>
    @foreach ($clientes as $item)
        <option value="{{ $item->id }}"
            {{ ($pedido->cliente_id ?? old('cliente_id')) == $item->id ? 'selected' : '' }}>
            {{ $item->nome }}</option>
    @endforeach
</select>
{{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}
<button type="submit" class="borda-preta">Cadastrar</button>
</form>
