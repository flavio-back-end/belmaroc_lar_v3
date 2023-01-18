<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Writer;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Cache;

class Writeractivity
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
        if (Auth::guard('writer')->check()) {
            $expiresAt = now()->addSeconds(40); //* already given time here we already set 2 min. */ // i gange this to 40 second

            Cache::put('writer-is-online-' . Auth::guard('writer')->user()->id, true, $expiresAt);

            /* user last seen */
            Writer::where('id', Auth::guard('writer')->user()->id)->update(['last_seen' => now()]);
        }
        // if (Auth::guard('writer')->check()) {
        //     $expire = now()->addMinute(1);
        //     Cache::put('writer-is-online-', Auth::guard('writer')->user()->id, true, $expire);
        // }
        // Writer::where('id', Auth::guard('writer')->user()->id)->update(['last_seen' => now()]);
        return $next($request);
    }
}
