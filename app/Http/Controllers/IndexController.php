<?php

namespace App\Http\Controllers;
use App\CatigorTop;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {

    	$catigories = CatigorTop::get();

    	return view('index')->with([
    		'catigories' => $catigories
    	]);
    }
}
