@if(isset($produto_detalhe->id))
    <form method="post" action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}">
          @method('PUT')
@else
    <form method="post" action="{{ route('produto-detalhe.store') }}">
@endif
        @csrf
        <input type="text" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" name="produto_id" placeholder="ID do produto" class="borda-preta">
        <small style="color: red;">{{$errors->has('produto_id') ? $errors->first('produto_id') : ''}}</small>

        <input type="text" value="{{ $produto_detalhe->comprimento ??  old('comprimento') }}" name="comprimento" placeholder="Comprimento" class="borda-preta">
        <small style="color: red;">{{$errors->has('comprimento') ? $errors->first('comprimento') : ''}}</small>

        <input type="text" value="{{ $produto_detalhe->largura ??  old('largura') }}" name="largura" placeholder="Largura" class="borda-preta">
        <small style="color: red;">{{$errors->has('largura') ? $errors->first('largura') : ''}}</small>

        <input type="text" value="{{ $produto_detalhe->altura ??  old('altura') }}" name="altura" placeholder="Altura" class="borda-preta">
        <small style="color: red;">{{$errors->has('altura') ? $errors->first('altura') : ''}}</small>        

        <select name="unidade_id">
            <option>--Selecione a unidade de medida</option>
            @foreach ($unidades as $unidade)
                            
            <option value="{{$unidade->id}}"  {{ $produto_detalhe->unidade_id ??  old('unidade_id') == $unidade->id ? 'selected' : '' }}>{{$unidade->descricao}}</option>

            @endforeach

        </select>
        <small style="color: red;">{{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}</small>

        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>