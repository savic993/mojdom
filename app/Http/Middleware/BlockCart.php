<?php

namespace App\Http\Middleware;

use Closure;

class BlockCart
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
        if (!$request->session()->has('user'))
        {
            return redirect('/')->with('error', 'Nemate pravo pristupa');
        }
        else
        {
            $user = $request->session()->get('user');
            $url = $request->url();
            $array = explode('/',$url);
            $param = $array[4];

            if($user[0]->id != $param)
            {
                return redirect('/')->with('error', 'Nemate pravo pristupa');
            }
            else
            {
                return $next($request);
            }
        }
    }
}
