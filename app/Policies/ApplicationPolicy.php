<?php

namespace App\Policies;

use Auth;
use App\Application;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApplicationPolicy
{
    use HandlesAuthorization;

    public function display(User $user, Application $item)
    {
        if(Auth::check() && Auth::user()->can('application-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Application $item)
    {
        if (Auth::check() && Auth::user()->can('application-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, Application $item)
    {
        if(Auth::check() && Auth::user()->can('application-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, Application $item)
    {
        if(Auth::check() && Auth::user()->can('application-delete'))
        {
            return true;
        }
        return false;
    }
}
