<?php

namespace App\Policies;

use Auth;
use App\Event;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    public function display(User $user, Event $item)
    {
        if(Auth::check() && Auth::user()->can('event-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Event $item)
    {
        if (Auth::check() && Auth::user()->can('event-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, Event $item)
    {
        if(Auth::check() && Auth::user()->can('event-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, Event $item)
    {
        if(Auth::check() && Auth::user()->can('event-delete'))
        {
            return true;
        }
        return false;
    }
}
