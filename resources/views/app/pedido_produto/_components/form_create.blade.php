    <form method="post" action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}">
        @csrf
        <select name="produto_id">
            <option>--Selecione um pedido_produto</option>
            @foreach ($produtos as $produto)
                            
                <option value="{{ $produto->id }}" {{ old('produto_id') == $produto->id ? 'selected' : '' }} >{{ $produto->nome }}</option>

            @endforeach

        </select>        

        <small style="color: red;">{{$errors->has('produto_id') ? $errors->first('produto_id') : ''}}</small>

        <input type="number" name="quantidade" value="{{ old('quantidade') ?  old('quantidade') : ''}}"  placeholder="Quantidade" class="borda-preta">
        <small style="color: red;">{{$errors->has('quantidade') ? $errors->first('quantidade') : ''}}</small>

        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>