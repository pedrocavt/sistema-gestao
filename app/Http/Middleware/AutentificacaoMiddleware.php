<?php

namespace App\Http\Middleware;

use Closure;

class AutentificacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao)
    {
        echo $metodo_autenticacao;
        // return $next($request);
        return Response('acesso negado! Rota exige login');
    }
}
