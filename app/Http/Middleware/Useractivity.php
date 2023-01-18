<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Writer;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Session;

class Useractivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $expiresAt = now()->addMinutes(1); /* already given time here we already set 2 min. */
            Cache::put('user-is-online-' . Auth::user()->id, true, $expiresAt);

            /* user last seen */
            User::where('id', Auth::user()->id)->update(['last_seen' => now()]);
        }

        // if (Auth::guard('writer')->check()) {
        //     $expire = now()->addMinute(1);
        //     Cache::put('writer-is-online-', Auth::guard('writer')->user()->id, true, $expire);
        // }
        // Writer::where('id', Auth::guard('writer')->user()->id)->update(['last_seen' => now()]);

        return $next($request);
    }
}
