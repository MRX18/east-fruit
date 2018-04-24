<?php

namespace App\Policies;

use Auth;
use App\Blog;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    public function display(User $user, Blog $item)
    {
        if(Auth::check() && Auth::user()->can('blog-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Blog $item)
    {
        if (Auth::check() && Auth::user()->can('blog-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, Blog $item)
    {
        if(Auth::check() && Auth::user()->can('blog-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, Blog $item)
    {
        if(Auth::check() && Auth::user()->can('blog-delete'))
        {
            return true;
        }
        return false;
    }
}
