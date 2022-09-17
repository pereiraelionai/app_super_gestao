<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        //var_dump($_GET);
        /*
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        */

        /*
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';

        echo $request->input('nome');
        echo '<br>';
        echo $request->input('email');
        */

        /*
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        //print_r($contato->getAttributes());

        */

        //$contato = new SiteContato();
        //$contato->fill($request->all());
        //$contato->create($request->all());

        //print_r($contato->getAttributes());

        //$contato->save();
        $motivo_contato = MotivoContato::all();

        return view('site.contato', ['motivo_contato' => $motivo_contato]);
    }

    public function salvar (Request $request) {
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos', //no minimo 3 caracteres e no máximo 40
            'email' => 'email',
            'telefone' => 'required',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:200'
        ];
        $feedback = [
            'nome.required' => 'O campo nome precisa ser preenchido',
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',
            'telefone.required' => 'O campo telefone precisa ser preenchido',

            //'required' => 'O campo precisa ser preenchido',
            'required' => 'O campo :attribute deve ser preenchido',
            'email' => 'Digite um email válido',
            'mensagem.max' => 'A mensagem deve ter no máximo 200 caracteres'
        ];
        //realizar a validação dos dados
        //name do input
        $request->validate($regras, $feedback);
        
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
