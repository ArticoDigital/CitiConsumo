<?php

namespace City\Http\Requests;

use City\Http\Requests\Request;
use Illuminate\Support\Facades\Route;

class RoleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    private $isNotAuthorized = false;

    public function authorize()
    {
        $role = auth()->user()->role_id;
        $route = Route::getRoutes()->match($this);
        $roles = isset($route->getAction()['roles']) ? $route->getAction()['roles'] : null;

        if ($roles) {
            $authorized = is_array($roles) ? in_array($role, $roles) : $role == $roles;
            $this->isNotAuthorized = !$authorized;
        }

        return true;
    }

    public function isNotAuthorized()
    {
        return $this->isNotAuthorized;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
