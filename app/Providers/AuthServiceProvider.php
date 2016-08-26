<?php

namespace City\Providers;

use Illuminate\Support\Facades\Auth;
use City\Policies\RoutePolicy;
use City\Entities\Role;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Role::class => RoutePolicy::class
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('hasRole',function($roles){
            return $this->hasRole($roles) || !$roles;
        });
    }

    private function hasRole($roles)
    {
        return false;
        /*$userRole = 1;
        $flag = false;
        if(is_array($roles)){
            foreach($roles as $role){
                if($role == $userRole)
                    $flag = true;
            }

        } else {
            return $roles == $userRole;
        }

        return false;*/
    }
}
