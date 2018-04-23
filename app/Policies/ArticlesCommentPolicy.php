<?php

namespace App\Policies;

use Auth;
use App\ArticlesComment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlesCommentPolicy
{
    use HandlesAuthorization;

    public function display(User $user, ArticlesComment $item)
    {
        if(Auth::check() && Auth::user()->can('article-coment-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, ArticlesComment $item)
    {
        if (Auth::check() && Auth::user()->can('article-coment-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, ArticlesComment $item)
    {
        if(Auth::check() && Auth::user()->can('article-coment-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, ArticlesComment $item)
    {
        if(Auth::check() && Auth::user()->can('article-coment-delete'))
        {
            return true;
        }
        return false;
    }
}
