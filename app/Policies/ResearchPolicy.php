<?php

namespace App\Policies;

use Auth;
use App\Research;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResearchPolicy
{
    use HandlesAuthorization;

    public function display(User $user, Research $item)
    {
        if(Auth::check() && Auth::user()->can('research-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Research $item)
    {
        if (Auth::check() && Auth::user()->can('research-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, Research $item)
    {
        if(Auth::check() && Auth::user()->can('research-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, Research $item)
    {
        if(Auth::check() && Auth::user()->can('research-delete'))
        {
            return true;
        }
        return false;
    }
}
