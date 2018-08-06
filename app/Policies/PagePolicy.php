<?php

namespace App\Policies;

use Auth;
use App\Page;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
{
    use HandlesAuthorization;

    public function display(User $user, Page $item)
    {
        if(Auth::check() && Auth::user()->can('page-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Page $item)
    {
        if (Auth::check() && Auth::user()->can('page-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, Page $item)
    {
        if(Auth::check() && Auth::user()->can('page-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, Page $item)
    {
        if(Auth::check() && Auth::user()->can('page-delete'))
        {
            return true;
        }
        return false;
    }
}
