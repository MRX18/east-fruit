<?php

namespace App\Policies;

use Auth;
use App\Article;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function display(User $user, Article $item)
    {
        if(Auth::check() && Auth::user()->can('article-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Article $item)
    {
        if (Auth::check() && Auth::user()->can('article-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, Article $item)
    {
        if(Auth::check() && Auth::user()->can('article-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, Article $item)
    {
        if(Auth::check() && Auth::user()->can('article-delete'))
        {
            return true;
        }
        return false;
    }
}
