<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpKernel\Exception\HttpException;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response //Permite el acceso a ciertas solicitudes
    {                                                               //dentro de la página. Si no, se le redirije
        if($request->user() && $request->user()->hasRole('Admin')) //con un mensaje de error.
        {
            return $next($request);
        }
        return redirect()->route('home')->with('error', 'Acceso denegado');
    }
}
