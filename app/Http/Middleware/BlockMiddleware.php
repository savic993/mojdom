<?php

namespace App\Http\Middleware;

use Closure;

class BlockMiddleware
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
        if ($request->session()->has('user'))
        {
            $user = $request->session()->get('user');

            if ($user[0]->name == "administrator")
            {
                return redirect('/admin/home')->with('error', 'Nemate pravo pristupa');
            }
            else
            {
                return $next($request);
            }
        }
        else
        {
            return $next($request);
        }
    }
}
