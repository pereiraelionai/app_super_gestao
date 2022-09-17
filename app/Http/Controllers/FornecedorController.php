<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
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
        */

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
