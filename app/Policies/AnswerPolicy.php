<?php

namespace App\Policies;

use Auth;
use App\Answer;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
{
    use HandlesAuthorization;

    public function display(User $user, Answer $item)
    {
        if(Auth::check() && Auth::user()->can('answer-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Answer $item)
    {
        if (Auth::check() && Auth::user()->can('answer-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, Answer $item)
    {
        if(Auth::check() && Auth::user()->can('answer-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, Answer $item)
    {
        if(Auth::check() && Auth::user()->can('answer-delete'))
        {
            return true;
        }
        return false;
    }
}
