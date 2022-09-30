@if(isset($produto->id))
    <form method="post" action="{{ route('produto.update', ['produto' => $produto->id]) }}">
          @method('PUT')
@else
    <form method="post" action="{{ route('produto.store') }}">
@endif
        @csrf
        <select name="fornecedor_id">
            <option>--Selecione um fornecedor</option>
            @foreach ($fornecedores as $fornecedor)
                            
            <option value="{{$fornecedor->id}}"  {{ ($produto->fornecedor_id ??  old('fornecedor_id')) == $fornecedor->id ? 'selected' : '' }}>{{$fornecedor->nome}}</option>

            @endforeach

        </select>
        <small style="color: red;">{{$errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : ''}}</small>


        <input type="text" value="{{ $produto->nome ?? old('nome') }}" name="nome" placeholder="Nome" class="borda-preta">
        <small style="color: red;">{{$errors->has('nome') ? $errors->first('nome') : ''}}</small>

        <input type="text" value="{{ $produto->descricao ??  old('descricao') }}" name="descricao" placeholder="Descrição" class="borda-preta">
        <small style="color: red;">{{$errors->has('descricao') ? $errors->first('descricao') : ''}}</small>

        <input type="text" value="{{ $produto->peso ??  old('peso') }}" name="peso" placeholder="Peso" class="borda-preta">
        <small style="color: red;">{{$errors->has('peso') ? $errors->first('peso') : ''}}</small>

        <select name="unidade_id">
            <option>--Selecione a unidade de medida</option>
            @foreach ($unidades as $unidade)
                            
                <option value="{{ $unidade->id }}" {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }} >{{ $unidade->descricao }}</option>

            @endforeach

        </select>
        <small style="color: red;">{{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}</small>

        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>