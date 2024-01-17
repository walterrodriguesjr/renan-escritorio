<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NivelAcessoAdministrador
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está autenticado e se o tipoAcessoUsuario é diferente de 'Usuário'
        if (auth()->check() && auth()->user()->userDados->tipoAcessoUsuario !== 'Usuário') {
            return $next($request);
        }

        // Redirecione ou retorne uma resposta de erro, dependendo do seu caso
        return redirect('/dashboard')->with('error', 'Acesso não autorizado.');
    }
}
