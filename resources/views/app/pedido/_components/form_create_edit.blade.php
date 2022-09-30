@if(isset($pedido->id))
    <form method="post" action="{{ route('pedido.update', ['pedido' => $pedido->id]) }}">
          @method('PUT')
@else
    <form method="post" action="{{ route('pedido.store') }}">
@endif
        @csrf
        <select name="cliente_id">
            <option>--Selecione a unidade de medida</option>
            @foreach ($clientes as $cliente)
                            
                <option value="{{ $cliente->id }}" {{ ($pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : '' }} >{{ $cliente->nome }}</option>

            @endforeach

        </select>        

        <small style="color: red;">{{$errors->has('cliente_id') ? $errors->first('cliente_id') : ''}}</small>

        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>