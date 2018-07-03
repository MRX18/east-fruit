<?php

namespace App\Policies;

use Auth;
use App\Banners;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BannersPolicy
{
    use HandlesAuthorization;

    public function display(User $user, Banners $item)
    {
        if(Auth::check() && Auth::user()->can('banner-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Banners $item)
    {
        if (Auth::check() && Auth::user()->can('banner-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, Banners $item)
    {
        if(Auth::check() && Auth::user()->can('banner-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, Banners $item)
    {
        if(Auth::check() && Auth::user()->can('banner-delete'))
        {
            return true;
        }
        return false;
    }
}
