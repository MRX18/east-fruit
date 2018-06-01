<?php

namespace App\Policies;

use Auth;
use App\Currency;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CurrencyPolicy
{
    use HandlesAuthorization;

    public function display(User $user, Currency $item)
    {
        if(Auth::check() && Auth::user()->can('currency-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Currency $item)
    {
        if (Auth::check() && Auth::user()->can('currency-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, Currency $item)
    {
        if(Auth::check() && Auth::user()->can('currency-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, Currency $item)
    {
        if(Auth::check() && Auth::user()->can('currency-delete'))
        {
            return true;
        }
        return false;
    }
}
