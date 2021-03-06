<?php

namespace City\Http\Middleware;

use Closure;

class BrowserChk
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        if($request->ip() != '127.0.0.1' && $request->ip() != '192.168.10.1'){

            $browser = get_browser(null, true);
            if( $request->route()->getPath() != "nosoportado"){
                if($browser['browser']=="IE")
                    return redirect('nosoportado');
            }
        }

        return $next($request);
    }

}
