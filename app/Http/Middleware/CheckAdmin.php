<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class CheckAdmin
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
        $user_id = $request->user()->id;

        $roles = DB::table('users')
                    ->select('role_id')
                    ->where('id', $user_id)
                    ->first()->role_id;

        if($roles == 2 || $roles == 3)
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('logout');
        }
        abort(403);
    }
}
