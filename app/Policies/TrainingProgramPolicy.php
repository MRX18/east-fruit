<?php

namespace App\Policies;

use Auth;
use App\TrainingProgram;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrainingProgramPolicy
{
    use HandlesAuthorization;

    public function display(User $user, TrainingProgram $item)
    {
        if(Auth::check() && Auth::user()->can('training-program-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, TrainingProgram $item)
    {
        if (Auth::check() && Auth::user()->can('training-program-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, TrainingProgram $item)
    {
        if(Auth::check() && Auth::user()->can('training-program-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, TrainingProgram $item)
    {
        if(Auth::check() && Auth::user()->can('training-program-delete'))
        {
            return true;
        }
        return false;
    }
}
