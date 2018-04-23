<?php

namespace App\Policies;

use Auth;
use App\Price;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PricePolicy
{
    use HandlesAuthorization;

    public function display(User $user, Price $item)
    {
        if(Auth::check() && Auth::user()->can('price-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Price $item)
    {
        if (Auth::check() && Auth::user()->can('price-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, Price $item)
    {
        if(Auth::check() && Auth::user()->can('price-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, Price $item)
    {
        if(Auth::check() && Auth::user()->can('price-delete'))
        {
            return true;
        }
        return false;
    }
}
