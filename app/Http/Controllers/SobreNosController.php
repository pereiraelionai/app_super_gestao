<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Middleware\LogAcessoMidlleware;

class SobreNosController extends Controller
{      
    //inclusão do middleware diretamente no controlador
    /*
    public function __construct() {
        $this->middleware(LogAcessoMidlleware::class);
    }
    */

    public function __construct () {
        $this->middleware('log.acesso');
    }

    public function sobreNos() {
        return view('site.sobre_nos');
    }
}
