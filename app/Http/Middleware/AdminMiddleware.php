<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        //esta validación es por el login, pero si usamos el middleware en la ruta, ya no es necesario
        /*if (!auth()->check()) {
            return redirect('/login');
        }*/

        /*acá validamos si es admin o no*/
        if (!auth()->user()->admin) {                
            //dd('no soy admin');
            return redirect('/');
        }
        //dd('soy admin');
        return $next($request);
    }
}
