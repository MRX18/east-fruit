<?php

namespace App\Policies;

use Auth;
use App\Role;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    public function display(User $user, Role $role)
    {
        if(Auth::check() && Auth::user()->can('roles-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Role $role)
    {
        if (Auth::check() && Auth::user()->can('roles-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, Role $role)
    {
        if(Auth::check() && Auth::user()->can('roles-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, Role $role)
    {
        if(Auth::check() && Auth::user()->can('roles-delete'))
        {
            return true;
        }
        return false;
    }
}
