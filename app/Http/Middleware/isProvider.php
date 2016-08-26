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
            return redirect('admin')->with(['alertTitle' => '¡Aun no eres proveedor!', 'alertText' => '<p>Tus documentos estan en revisión, proximamente prodras ser un proveedor de servicios.</p> <p>Estaremos en contacto contigo.</p>']);
        }
        return redirect()->route('uploadFiles');
    }
}
