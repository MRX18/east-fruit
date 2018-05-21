<?php

namespace App\Policies;

use Auth;
use App\TrainingOrganizer;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrainingOrganizerPolicy
{
    use HandlesAuthorization;

    public function display(User $user, TrainingOrganizer $item)
    {
        if(Auth::check() && Auth::user()->can('training-organizer-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, TrainingOrganizer $item)
    {
        if (Auth::check() && Auth::user()->can('training-organizer-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, TrainingOrganizer $item)
    {
        if(Auth::check() && Auth::user()->can('training-organizer-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, TrainingOrganizer $item)
    {
        if(Auth::check() && Auth::user()->can('training-organizer-delete'))
        {
            return true;
        }
        return false;
    }
}
