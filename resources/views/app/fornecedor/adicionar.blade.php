@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <small style="background-color: green; color: white;">{{isset($msg) ? $msg : ''}}</small>
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{ route('app.fornecedor.adicionar') }}">
                    <input type="hidden" name="id" value="{{ $fornecedor->id ?? ''}}">
                    @csrf
                    <input type="text" value="{{ $fornecedor->nome ?? old('nome') }}" name="nome" placeholder="Nome" class="borda-preta">
                    <small style="color: red;">{{$errors->has('nome') ? $errors->first('nome') : ''}}</small>

                    <input type="text" value="{{ $fornecedor->site ?? old('site') }}" name="site" placeholder="Site" class="borda-preta">
                    <small style="color: red;">{{$errors->has('site') ? $errors->first('site') : ''}}</small>

                    <input type="text" value="{{$fornecedor->uf ??  old('uf') }}" name="uf" placeholder="Uf" class="borda-preta">
                    <small style="color: red;">{{$errors->has('uf') ? $errors->first('uf') : ''}}</small>

                    <input type="text" value="{{ $fornecedor->email ??  old('email') }}" name="email" placeholder="Email" class="borda-preta">
                    <small style="color: red;">{{$errors->has('email') ? $errors->first('email') : ''}}</small>

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>                
    </div>
@endsection