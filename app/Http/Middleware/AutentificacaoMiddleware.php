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
        session_start();

        if (isset($_SESSION['nome']) && $_SESSION['nome'] != '') {
            return $next($request);
        }

        return redirect()->route('site.login', ['erro' => 2]);
    }
}
