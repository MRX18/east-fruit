<?php

namespace App\Policies;

use Auth;
use App\ResearchContent;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResearchContentPolicy
{
    use HandlesAuthorization;

    public function display(User $user, ResearchContent $item)
    {
        if(Auth::check() && Auth::user()->can('research-content-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, ResearchContent $item)
    {
        if (Auth::check() && Auth::user()->can('research-content-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, ResearchContent $item)
    {
        if(Auth::check() && Auth::user()->can('research-content-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, ResearchContent $item)
    {
        if(Auth::check() && Auth::user()->can('research-content-delete'))
        {
            return true;
        }
        return false;
    }
}
