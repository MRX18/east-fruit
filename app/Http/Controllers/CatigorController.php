<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatigorTop;
use App\Article;

class CatigorController extends Controller
{
    public function index($id) {
    	$title = "Главная";
    	$catigories = CatigorTop::get();

    	foreach($catigories as $catigor) {
    		if($catigor->id == $id) {
    			$title = $catigor->title;
    		}
    	}

    	$articles = Article::where('id_catigories', $id)->orderByDesc('id')->paginate(24);

    	foreach($articles as $option) {
    		foreach ($catigories as $catigor) {
    			if($option->id_catigories == $catigor->id) {
    				$option->catigor = $catigor->title;
    			}
    		}
    	}

    	return view('catigories')->with([
    		'title' => $title,
    		'catigories' => $catigories,

    		'articles' => $articles
    	]);
    }
}
