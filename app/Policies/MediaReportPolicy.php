<?php

namespace App\Policies;

use Auth;
use App\MediaReport;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MediaReportPolicy
{
    use HandlesAuthorization;

    public function display(User $user, MediaReport $item)
    {
        if(Auth::check() && Auth::user()->can('media-report-list'))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, MediaReport $item)
    {
        if (Auth::check() && Auth::user()->can('media-report-create'))
        {
            return true;
        }
        return false;
    }

    public function edit(User $user, MediaReport $item)
    {
        if(Auth::check() && Auth::user()->can('media-report-edit'))
        {
            return true;
        }
        return false;
    }

    public function delete(User $user, MediaReport $item)
    {
        if(Auth::check() && Auth::user()->can('media-report-delete'))
        {
            return true;
        }
        return false;
    }
}
