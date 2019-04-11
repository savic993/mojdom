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
        if ($request->session()->has('user'))
        {
            $user = $request->session()->get('user');

            if ($user[0]->name == "administrator")
            {
                return $next($request);
            }
            else
            {
                return redirect('/')->with('error', 'Niste ulogovani ili nemate pravo pristupa');
            }
        }
        else
        {
            return redirect('/')->with('error', 'Niste ulogovani');
        }

    }
}
