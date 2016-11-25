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

        /*$browser = get_browser(null, true);

        if( $request->route()->getPath() != "nosoportado"){
            if($browser['browser']=="IE")
                return redirect('nosoportado');
        }
*/
        return $next($request);
    }

}
