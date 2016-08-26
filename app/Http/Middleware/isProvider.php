<?php

namespace City\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isProvider
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
        $user = Auth::user();
        $provider = $user->provider;
        if(isset($provider)){
            if($provider->isActive)
                return $next($request);
            return redirect()->to('admin' );
        }
        return redirect()->route('uploadFiles' );
    }
}
