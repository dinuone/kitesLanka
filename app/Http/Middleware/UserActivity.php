<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Student;
use Auth;
use Cache;

class UserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('student')->check()){
            $expireAt = now()->addMinutes(2);
            Cache::put('user-is-online'. Auth::user()->id, true, $expireAt);

            Student::where('id',Auth::user()->id)->update(['last_seen' => now()]);
        }
        return $next($request);
    }
}
