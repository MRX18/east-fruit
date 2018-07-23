<?php

namespace App\Policies;

use Auth;
use App\BlogComment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogCommentPolicy
{
    use HandlesAuthorization;

    public function display(User $user, BlogComment $item)
    {
        if(Auth::check() && Auth::user()->can('blog-comment-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, BlogComment $item)
    {
        if (Auth::check() && Auth::user()->can('blog-comment-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, BlogComment $item)
    {
        if(Auth::check() && Auth::user()->can('blog-comment-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, BlogComment $item)
    {
        if(Auth::check() && Auth::user()->can('blog-comment-delete'))
        {
            return true;
        }
        return false;
    }
}
