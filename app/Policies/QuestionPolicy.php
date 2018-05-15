<?php

namespace App\Policies;

use Auth;
use App\Question;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;

    public function display(User $user, Question $item)
    {
        if(Auth::check() && Auth::user()->can('question-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Question $item)
    {
        if (Auth::check() && Auth::user()->can('question-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, Question $item)
    {
        if(Auth::check() && Auth::user()->can('question-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, Question $item)
    {
        if(Auth::check() && Auth::user()->can('question-delete'))
        {
            return true;
        }
        return false;
    }
}
