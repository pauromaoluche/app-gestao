{{ $slot }}
<form action="{{ route('site.contato') }}" method="POST">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="borda-preta">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="borda-preta">
    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
    <br>
    <input name="email" value="{{ old('email') }}" type="email" placeholder="E-mail" class="borda-preta">
    {{ $errors->has('email') ? $errors->first('email') : '' }}
    <br>
    <select name="motivo_contato_id" class="borda-preta">
        <option value="">Qual o motivo do contato?</option>

        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{ $motivo_contato->id }}"
                {{ old('motivo_contato_id') == $motivo_contato->id ? 'selected' : '' }}>
                {{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select>
    {{ $errors->has('motivo_contato_id') ? $errors->first('motivo_contato_id') : '' }}
    <br>
    <textarea name="mensagem" class="borda-preta">{{ old('mensagem') != '' ? old('mensagem') : 'Escreve a mensagem aqui' }}
    </textarea>
    {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>

{{-- Verifica se existe erro no $erros, e depois o percorre mostrando os erros
@if ($errors->any())
    <div>
        @foreach ($errors->all() as $erro)
            {{ $erro }}
            <br>
        @endforeach
    </div>
@endif --}}
