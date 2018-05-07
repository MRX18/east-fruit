<?php

namespace App\Policies;

use Auth;
use App\Product;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function display(User $user, Product $item)
    {
        if(Auth::check() && Auth::user()->can('product-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Product $item)
    {
        if (Auth::check() && Auth::user()->can('product-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, Product $item)
    {
        if(Auth::check() && Auth::user()->can('product-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, Product $item)
    {
        if(Auth::check() && Auth::user()->can('product-delete'))
        {
            return true;
        }
        return false;
    }
}
