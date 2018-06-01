<?php

namespace App\Policies;

use Auth;
use App\Specification;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SpecificationPolicy
{
    use HandlesAuthorization;

    public function display(User $user, Specification $item)
    {
        if(Auth::check() && Auth::user()->can('specification-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Specification $item)
    {
        if (Auth::check() && Auth::user()->can('specification-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, Specification $item)
    {
        if(Auth::check() && Auth::user()->can('specification-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, Specification $item)
    {
        if(Auth::check() && Auth::user()->can('specification-delete'))
        {
            return true;
        }
        return false;
    }
}
