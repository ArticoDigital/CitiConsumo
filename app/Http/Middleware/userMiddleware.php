<?php

namespace City\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use City\Entities\Service;

class userMiddleware
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
        if(!$user->isAdmin()){
            //dd($user->isAdmin());
            $id=$request->id;
            $service = Service::where('id', $id)->firstOrFail()->toArray();
            //dd();
            
            if(isset($service['provider_id'])){
                if ($service['provider_id'] != $user->provider->id) {
                    return redirect('admin');
                }
            }
            return $next($request);
        }
        return $next($request);
    }
}

