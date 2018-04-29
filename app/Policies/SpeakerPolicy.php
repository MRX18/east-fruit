<?php

namespace App\Policies;

use Auth;
use App\Speaker;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SpeakerPolicy
{
    use HandlesAuthorization;

    public function display(User $user, Speaker $item)
    {
        if(Auth::check() && Auth::user()->can('speaker-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Speaker $item)
    {
        if (Auth::check() && Auth::user()->can('speaker-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, Speaker $item)
    {
        if(Auth::check() && Auth::user()->can('speaker-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, Speaker $item)
    {
        if(Auth::check() && Auth::user()->can('speaker-delete'))
        {
            return true;
        }
        return false;
    }
}
