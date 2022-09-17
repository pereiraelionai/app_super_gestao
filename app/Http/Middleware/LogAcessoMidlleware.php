<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMidlleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        //dd($request);
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "IP $ip requisitou a rota $rota"]);
        //return Response('Estamos no middleware');
        //return $next($request);

        $resposta = $next($request);
        $resposta->setStatusCode(201, 'O status e contexto da resposta foram modificados');
        //dd($resposta);
        return $resposta;

    }
}
