<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller 
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {

        $fornecedores = Fornecedor::with('produtos')->where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate(4); //usar get() se não quiser paginar

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request) {

        $msg = '';

        //cadastro de fornecedor
        if($request->input('_token') != '' && $request->input('id') == '') {
            //validar dados
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo UF deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo UF deve ter no máximo 2 caracteres',                
                'email' => 'O campo e-mail não foi preenchido corretamente'
            ];

            $request->validate($regras, $feedback);
            
            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            //msg - dados inseridos com sucesso
            $msg = 'Cadastro realizado com sucesso!';


        }

        //editando um fornecedor
        if($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update) {
                $msg = 'Atualização realizada com sucesso';
            } else {
                $msg = 'Erro ao editar';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
            
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);


    }

    public function editar($id, $msg='') {
        $fornecedor = Fornecedor::find($id);
        
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir($id) {
        Fornecedor::find($id)->delete();
        //Fornecedor::find($id)->forceDelete(); - Apagar definitivamente, não vai para o soft delete

        return redirect()->route('app.fornecedor');
    }
}
/*
{
    public function index() {
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1', 
                'status' => 'N',
                'CNPJ' => '0',
                'ddd' => '11',
                'telefone' => '00000-0000'
            ],
            1 => [
                'nome' => 'Fornecedor 2', 
                'status' => 'S',
                'CNPJ' => '0',
                'ddd' => '85',
                'telefone' => '00000-0000'
            ],
            2 => [
                'nome' => 'Fornecedor 3', 
                'status' => 'S',
                'CNPJ' => '0',
                'ddd' => '32',
                'telefone' => '00000-0000'
                ]            
        ];


        /*
        //operador ternário
        $msg =  isset($fornecedores[0]['CNPJ']) ? 'CNPJ existe' : 'CNPJ não existe';
        echo $msg;
        

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
*/