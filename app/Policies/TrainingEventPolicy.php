<?php

namespace App\Policies;

use Auth;
use App\TrainingEvent;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrainingEventPolicy
{
    use HandlesAuthorization;

    public function display(User $user, TrainingEvent $item)
    {
        if(Auth::check() && Auth::user()->can('training-event-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, TrainingEvent $item)
    {
        if (Auth::check() && Auth::user()->can('training-event-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, TrainingEvent $item)
    {
        if(Auth::check() && Auth::user()->can('training-event-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, TrainingEvent $item)
    {
        if(Auth::check() && Auth::user()->can('training-event-delete'))
        {
            return true;
        }
        return false;
    }
}
