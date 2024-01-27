{{ $slot }}
<form action="{{ route('site.contato') }}" method="POST">
    @csrf
    <input name="nome" value={{ old('nome') }} type="text" placeholder="Nome" class="borda-preta">
    <br>
    <input name="telefone" value={{ old('telefone') }} type="text" placeholder="Telefone" class="borda-preta">
    <br>
    <input name="email" value={{ old('email') }} type="email" placeholder="E-mail" class="borda-preta">
    <br>
    <select name="motivo_contato" class="borda-preta">
        <option value="">Qual o motivo do contato?</option>

        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{ $key }}" {{ old('motivo_contato') == $key ? 'selected' : '' }}>{{ $motivo_contato }}</option>            
        @endforeach

    </select>
    <br>
    <textarea name="mensagem" class="borda-preta">{{ (old('mensagem') != '') ? old('mensagem') : 'Escreve a mensagem aqui' }}
    </textarea>
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>
