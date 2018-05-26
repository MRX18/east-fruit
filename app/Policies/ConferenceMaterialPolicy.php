<?php

namespace App\Policies;

use Auth;
use App\ConferenceMaterial;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConferenceMaterialPolicy
{
    use HandlesAuthorization;

    public function display(User $user, ConferenceMaterial $item)
    {
        if(Auth::check() && Auth::user()->can('conference-material-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, ConferenceMaterial $item)
    {
        if (Auth::check() && Auth::user()->can('conference-material-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, ConferenceMaterial $item)
    {
        if(Auth::check() && Auth::user()->can('conference-material-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, ConferenceMaterial $item)
    {
        if(Auth::check() && Auth::user()->can('conference-material-delete'))
        {
            return true;
        }
        return false;
    }
}
