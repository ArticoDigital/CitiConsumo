<?php

namespace City\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use City\User;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */

    public function hasRole(User $user){
        return $this->getRoles($user) || !$user['roles'];
    }

    private function getRoles($user)
    {
        $roles = $user['roles'];

        if($user->role_id == 2 && isset($user->provider)){
            if($user->provider->isActive)
                return true;
            return false;
        }

        if(is_array($roles)){
            foreach($roles as $role){
                if($role == $user->role_id)
                    return true;
            }
        } else {
            return $roles == $user->role_id;
        }

        return false;
    }
}
