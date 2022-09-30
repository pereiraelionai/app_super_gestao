@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="#">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
                <div style="width: 90%; margin-left: auto; margin-right: auto;">
                    <table border="1" width="100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>ID Fornecedor</th>
                                <th>Peso</th>
                                <th>Unidade(id)</th>
                                <th>Comprimento</th>
                                <th>Altura</th>
                                <th>Largura</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        @foreach($produtos as $produto)

                        <tbody>
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->fornecedor->nome }}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->unidade_id }}</td>
                                <td>{{ $produto->produtoDetalhe->comprimento ?? '' }}</td>
                                <td>{{ $produto->produtoDetalhe->altura ?? '' }}</td>
                                <td>{{ $produto->produtoDetalhe->largura ?? '' }}</td>
                                <td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                                <td><a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a></td>
                                <td>
                                    <form method="post" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <!--<a href="#"  onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>-->
                                    <button type="submit">Excluir</button>
                                    </form>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="12">
                                    <p>Pedidos</p>
                                    @foreach($produto->pedidos as $pedido)
                                        <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">
                                        Pedido: {{$pedido->id}}, 
                                        </a>
                                    @endforeach
                                </td>
                            </tr>

                        </tbody>
                        @endforeach
                    </table>

                    {{ $produtos->appends($request)->links() }}
                    <br>
                    <!--
                    {{ $produtos->count() }} - Total de registros por página
                    <br>
                    {{ $produtos->total() }} - Total de registros por consulta
                    <br>
                    {{ $produtos->firstItem() }} - Posição do primeiro registro da página
                    <br>
                    {{ $produtos->lastItem() }} - Posição do útlimo registro da página
                    -->
                    Exibindo {{ $produtos->count() }} fornecedores por página de {{ $produtos->total() }} (de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})
                </div>
        </div>                
    </div>
@endsection