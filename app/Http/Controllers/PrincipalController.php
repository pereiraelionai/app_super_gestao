<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContato;

class PrincipalController extends Controller
{   
    public function principal() {

        $motivo_contato = MotivoContato::all();

        return view('site.principal', ['titulo' => 'Principal', 'motivo_contato' => $motivo_contato]);
    }
}
