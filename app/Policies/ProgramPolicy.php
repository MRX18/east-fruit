<?php

namespace App\Policies;

use Auth;
use App\Program;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProgramPolicy
{
    use HandlesAuthorization;

    public function display(User $user, Program $item)
    {
        if(Auth::check() && Auth::user()->can('program-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Program $item)
    {
        if (Auth::check() && Auth::user()->can('program-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, Program $item)
    {
        if(Auth::check() && Auth::user()->can('program-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, Program $item)
    {
        if(Auth::check() && Auth::user()->can('program-delete'))
        {
            return true;
        }
        return false;
    }
}
