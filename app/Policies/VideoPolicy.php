<?php

namespace App\Policies;

use Auth;
use App\Video;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class VideoPolicy
{
    use HandlesAuthorization;

    public function display(User $user, Video $item)
    {
        if(Auth::check() && Auth::user()->can('video-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Video $item)
    {
        if (Auth::check() && Auth::user()->can('video-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, Video $item)
    {
        if(Auth::check() && Auth::user()->can('video-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, Video $item)
    {
        if(Auth::check() && Auth::user()->can('video-delete'))
        {
            return true;
        }
        return false;
    }
}
