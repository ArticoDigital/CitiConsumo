<?php

namespace City\Http\Middleware;

use Illuminate\Support\Facades\Gate;
use Closure;

class CheckRoles
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
        $user = auth()->user();
        $user['roles'] = $this->isRestringed($request->route());

        if(Gate::denies('hasRole', $user)){
            if($user->role_id == 2)
                return redirect()->to('admin')->with(['alertTitle' => '¡Estás cerca de ser un proveedor!', 'alertText' => '<p>Tus documentos estan en revisión, proximamente prodras registrar tus productos y servicios.</p> <p>Estaremos en contacto contigo.</p>']);
            return redirect()->route('uploadFiles');
        }

        return $next($request);
    }

    private function isRestringed($route)
    {
        $actions = $route->getAction();
        return isset($actions['roles']) ? $actions['roles'] : null;
    }

}
