<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\CatigorTop;
use App\OtherTopCatigorie;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function catigorTop() {
    	return CatigorTop::get();
    }

    protected function otherCatigorTop() {
    	return OtherTopCatigorie::get();
    }

    protected function date($date) {
    	$date = explode('-', $date);
        return $date[2].'.'.$date[1].'.'.$date[0];
    }
}
