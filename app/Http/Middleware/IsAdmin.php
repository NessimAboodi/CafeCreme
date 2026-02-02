<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Gère la requête entrante.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifie si l'utilisateur est connecté ET s'il est admin (is_admin == 1)
        if (Auth::check() && Auth::user()->is_admin == 1) {
            return $next($request);
        }

        // Sinon, erreur 403
        abort(403, 'ACCÈS INTERDIT - Vous n\'avez pas les droits administrateur.');
    }
}
