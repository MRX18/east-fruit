<?php

namespace App\Policies;

use Auth;
use App\Market;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MarketPolicy
{
    use HandlesAuthorization;

    public function display(User $user, Market $item)
    {
        if(Auth::check() && Auth::user()->can('market-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Market $item)
    {
        if (Auth::check() && Auth::user()->can('market-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, Market $item)
    {
        if(Auth::check() && Auth::user()->can('market-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, Market $item)
    {
        if(Auth::check() && Auth::user()->can('market-delete'))
        {
            return true;
        }
        return false;
    }
}
