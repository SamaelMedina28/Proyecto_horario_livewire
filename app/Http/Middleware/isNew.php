<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isNew
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Si el usuario es nuevo, redirigirlo a la vista de materias
        if ($request->user()->nuevo == 1) {
            // $request->user()->update([
            //     'nuevo' => 0,
            // ]);
            return redirect()->route('materias.index');
        }
        // Si el usuario no es nuevo, continuar con la solicitud
        return $next($request);
    }
}
