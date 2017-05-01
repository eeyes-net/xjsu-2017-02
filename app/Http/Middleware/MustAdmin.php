<?php

namespace App\Http\Middleware;

use Closure;

class MustAdmin
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
        if (!in_array($request->user()->group, ['root', 'admin'])) {
            return redirect(action('Admin\IndexController@index'));
        }
        return $next($request);
    }
}
