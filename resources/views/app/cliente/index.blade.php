@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Clientes</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="#">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
                <div style="width: 90%; margin-left: auto; margin-right: auto;">
                    <table border="1" width="100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        @foreach($clientes as $cliente)

                        <tbody>
                            <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td><a href="{{ route('cliente.show', ['cliente' => $cliente->id]) }}">Visualizar</a></td>
                                <td><a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}">Editar</a></td>
                                <td>
                                    <form method="post" action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <!--<a href="#"  onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>-->
                                    <button type="submit">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>

                    {{ $clientes->appends($request)->links() }}
                    <br>
                    <!--
                    {{ $clientes->count() }} - Total de registros por página
                    <br>
                    {{ $clientes->total() }} - Total de registros por consulta
                    <br>
                    {{ $clientes->firstItem() }} - Posição do primeiro registro da página
                    <br>
                    {{ $clientes->lastItem() }} - Posição do útlimo registro da página
                    -->
                    Exibindo {{ $clientes->count() }} fornecedores por página de {{ $clientes->total() }} (de {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})
                </div>
        </div>                
    </div>
@endsection