<?php

namespace App\Policies;

use Auth;
use App\Image;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy
{
    use HandlesAuthorization;

    public function display(User $user, Image $item)
    {
        if(Auth::check() && Auth::user()->can('image-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Image $item)
    {
        if (Auth::check() && Auth::user()->can('image-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, Image $item)
    {
        if(Auth::check() && Auth::user()->can('image-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, Image $item)
    {
        if(Auth::check() && Auth::user()->can('image-delete'))
        {
            return true;
        }
        return false;
    }
}
