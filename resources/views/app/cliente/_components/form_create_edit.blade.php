@if(isset($cliente->id))
    <form method="post" action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}">
          @method('PUT')
@else
    <form method="post" action="{{ route('cliente.store') }}">
@endif
        @csrf
        <input type="text" value="{{ $cliente->nome ?? old('nome') }}" name="nome" placeholder="Nome" class="borda-preta">
        <small style="color: red;">{{$errors->has('nome') ? $errors->first('nome') : ''}}</small>

        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>