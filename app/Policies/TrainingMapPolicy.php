<?php

namespace App\Policies;

use Auth;
use App\TrainingMap;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrainingMapPolicy
{
    use HandlesAuthorization;

    public function display(User $user, TrainingMap $item)
    {
        if(Auth::check() && Auth::user()->can('training-map-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, TrainingMap $item)
    {
        if (Auth::check() && Auth::user()->can('training-map-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, TrainingMap $item)
    {
        if(Auth::check() && Auth::user()->can('training-map-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, TrainingMap $item)
    {
        if(Auth::check() && Auth::user()->can('training-map-delete'))
        {
            return true;
        }
        return false;
    }
}
