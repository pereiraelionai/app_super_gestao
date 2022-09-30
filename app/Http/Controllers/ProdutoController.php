<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Unidade;
use App\Item;
use App\Fornecedor;
use App\ProdutoDetalhe;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Item::with(['produtoDetalhe', 'fornecedor'])->paginate(10); // carregamento eager loading
        //$produtos = Item::paginate(10); // carregamento lazy loading


        /*
        //Relação 1:1 sem utilizar o eloquent
        foreach($produtos as $key => $produto) {
            //print_r($produto->getAttributes());
            //echo '<br><br>';

            $produtosDetalhes = ProdutoDetalhe::where('produto_id', $produto->id)->first();

            if(isset($produtosDetalhes)) {
                //print_r($produtosDetalhes->getAttributes());

                $produtos[$key]['comprimento'] = $produtosDetalhes->comprimento;
                $produtos[$key]['largura'] = $produtosDetalhes->largura;
                $produtos[$key]['altura'] = $produtosDetalhes->altura;


            }
            //echo '<hr>';
        }
        */
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id', //só será válido se o valor estiver na tabela unidades no campo id
            'fornecedor_id' => 'exists:fornecedores,id' //só será válido se o valor estiver na tabela fornecedores no campo id
        ];

        $feedback = [
            'required' => 'O campo :attributes deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'descricao.min' => 'O campo descrição deve ter no mínimo 3 caracteres',
            'descricao.max' => 'O campo dexcricão deve ter no máximo 2000 caracteres',
            'peso.integer' => 'O campo peso deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => 'O fornecedor informado não existe'
        ];

        $request->validate($regras, $feedback);

        Item::create($request->all()); //consulte a aula 164 de laravel para entender como mandar parametro por parametroe e poder fazer tratativas se for necessário.
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {   
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        //$request->all(); //dados do formulário
        //$produto //instância do objeto antes da atualização
        //dd($request->all());
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id', //só será válido se o valor estiver na tabela unidades no campo id
            'fornecedor_id' => 'exists:fornecedores,id' //só será válido se o valor estiver na tabela fornecedores no campo id
        ];

        $feedback = [
            'required' => 'O campo :attributes deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'descricao.min' => 'O campo descrição deve ter no mínimo 3 caracteres',
            'descricao.max' => 'O campo dexcricão deve ter no máximo 2000 caracteres',
            'peso.integer' => 'O campo peso deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => 'O fornecedor informado não existe'
        ];

        $request->validate($regras, $feedback);


        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
