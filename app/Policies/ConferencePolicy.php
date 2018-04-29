<?php

namespace App\Policies;

use Auth;
use App\Conference;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConferencePolicy
{
    use HandlesAuthorization;

    public function display(User $user, Conference $item)
    {
        if(Auth::check() && Auth::user()->can('conference-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Conference $item)
    {
        if (Auth::check() && Auth::user()->can('conference-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, Conference $item)
    {
        if(Auth::check() && Auth::user()->can('conference-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, Conference $item)
    {
        if(Auth::check() && Auth::user()->can('conference-delete'))
        {
            return true;
        }
        return false;
    }
}
