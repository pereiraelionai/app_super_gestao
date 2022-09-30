@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
        @include('site.layouts._parciais.topo')


        <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Login</h1>
            </div>

            <div class="informacao-pagina">
                
                <form action="{{ route('site.login') }}" method="post">
                <div style="width: 30%; margin-left: auto; margin-right: auto;">
                    @csrf
                    <input name="usuario" value="{{ old('usuario') }}" type="text" placeholder="Usuário" class="borda-preta">
                    <small style="color: red;">{{ $errors->has('usuario') ? $errors->first('usuario') : '' }}</small>
                    <input name="senha" value="{{ old('senha') }}" type="password" placeholder="Senha" class="borda-preta">
                    <small style="color: red;">{{ $errors->has('senha') ? $errors->first('senha') : '' }}</small>
                    <button type="submit" class="borda-preta">Acessar</button>
                </form>
                <small style="color: red;">{{ isset($erro) && $erro != '' ? $erro : '' }}</small>
            </div>  
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="rodape">
            <div class="redes-sociais">
                <h2>Redes sociais</h2>
                <img src="{{ asset('img/facebook.png') }}">
                <img src="{{ asset('img/linkedin.png') }}">
                <img src="{{ asset('img/youtube.png')}}">
            </div>
            <div class="area-contato">
                <h2>Contato</h2>
                <span>(11) 3333-4444</span>
                <br>
                <span>supergestao@dominio.com.br</span>
            </div>
            <div class="localizacao">
                <h2>Localização</h2>
                <img src="{{ asset('img/mapa.png') }}">
            </div>
        </div>
@endsection