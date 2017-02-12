<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class backendauth
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
        return $next($request);

    }
    public function is_user_auth(){

      if(Auth::check() && Auth::user()->group->role_id == '1'){

        return redirect('group.admin.index');
      }

    }
}
