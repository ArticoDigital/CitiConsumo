<?php

namespace City\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use City\User;

class RoutePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */

    public function isPrueba(){
        return false;
    }
}