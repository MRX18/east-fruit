<?php

namespace App\Policies;

use Auth;
use App\Training;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrainingPolicy
{
    use HandlesAuthorization;

    public function display(User $user, Training $item)
    {
        if(Auth::check() && Auth::user()->can('training-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Training $item)
    {
        if (Auth::check() && Auth::user()->can('training-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, Training $item)
    {
        if(Auth::check() && Auth::user()->can('training-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, Training $item)
    {
        if(Auth::check() && Auth::user()->can('training-delete'))
        {
            return true;
        }
        return false;
    }
}
