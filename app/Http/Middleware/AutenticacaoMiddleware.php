<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil)
    {   
        session_start();

        if(isset($_SESSION['email']) && $_SESSION['email'] != '') {
            return $next($request);
        } else {
            return redirect()->route('site.login', ['erro' => 2]);
        }

    }
}    
     
    /*
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil)
    {   
        echo "$metodo_autenticacao - $perfil <br>";

        if($metodo_autenticacao == 'padrao') {
            echo 'Verificar o usuário e senha no banco de dados <br>';
        }

        if($metodo_autenticacao == 'ldap') {
            echo 'Verificar usuário e senha no AD <br>';
        }

        //verifica se o usuario tem a cesso a rota
        if (false) {
            return $next($request);
        } else {
            return Response('Adcesso negado! A página exige autenticação');
        }

    }
}
    */