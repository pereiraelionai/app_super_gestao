@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de Pedidos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                <li><a href="#">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
                <div style="width: 90%; margin-left: auto; margin-right: auto;">
                    <table border="1" width="100%">
                        <thead>
                            <tr>
                                <th>ID do Pedido</th>
                                <th>Cliente</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        @foreach($pedidos as $pedido)

                        <tbody>
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->cliente_id }}</td>
                                <td><a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">Adicionar produto</a></td>
                                <td><a href="{{ route('pedido.show', ['pedido' => $pedido->id]) }}">Visualizar</a></td>
                                <td><a href="{{ route('pedido.edit', ['pedido' => $pedido->id]) }}">Editar</a></td>
                                <td>
                                    <form method="post" action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <!--<a href="#"  onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>-->
                                    <button type="submit">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>

                    {{ $pedidos->appends($request)->links() }}
                    <br>
                    <!--
                    {{ $pedidos->count() }} - Total de registros por página
                    <br>
                    {{ $pedidos->total() }} - Total de registros por consulta
                    <br>
                    {{ $pedidos->firstItem() }} - Posição do primeiro registro da página
                    <br>
                    {{ $pedidos->lastItem() }} - Posição do útlimo registro da página
                    -->
                    Exibindo {{ $pedidos->count() }} fornecedores por página de {{ $pedidos->total() }} (de {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }})
                </div>
        </div>                
    </div>
@endsection