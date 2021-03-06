<?php
namespace App\Policies;
use Auth;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
class UserPolicy
{
    use HandlesAuthorization;
    /**
     * @param User $user
     * @param User $item
     *
     * @return bool
     */
    public function display(User $user, User $item)
    {
        if(Auth::check() && Auth::user()->can('users-list'))
        {
            return true;
        }
        return false;
    }
    /**
     * @param User $user
     * @param User $item
     *
     * @return bool
     */
    public function create(User $user, User $item)
    {
        if (Auth::check() && Auth::user()->can('users-create'))
        {
            return true;
        }
        return false;
    }
    /**
     * @param User $user
     * @param User $item
     *
     * @return bool
     */
    public function edit(User $user, User $item)
    {
        if (Auth::check() && Auth::user()->can('users-edit'))
        {
            return true;
        }
        return false;
    }
    /**
     * @param User $user
     * @param User $item
     *
     * @return bool
     */
    public function delete(User $user, User $item)
    {
        if (Auth::check() && Auth::user()->can('users-delete'))
        {
            return true;
        }
        return false;
    }
}