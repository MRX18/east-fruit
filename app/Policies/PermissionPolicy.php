<?php

namespace App\Policies;

use Auth;
use App\Permission;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    public function display(User $user, Permission $role)
    {
        if(Auth::check() && Auth::user()->can('permission-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Permission $role)
    {
        if (Auth::check() && Auth::user()->can('permission-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, Permission $role)
    {
        if(Auth::check() && Auth::user()->can('permission-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, Permission $role)
    {
        if(Auth::check() && Auth::user()->can('permission-delete'))
        {
            return true;
        }
        return false;
    }
}
