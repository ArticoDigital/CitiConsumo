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
        /*$user = auth()->user();
        $user['roles'] = $this->isRestringed($request->route());

        if(Gate::denies('hasRole', $user)){
            return redirect()->to('admin');
        }*/

        return $next($request);
    }

    private function isRestringed($route)
    {
        $actions = $route->getAction();
        return isset($actions['roles']) ? $actions['roles'] : null;
    }

}
