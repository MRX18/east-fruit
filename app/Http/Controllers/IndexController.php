<?php

namespace App\Http\Controllers;
use App\CatigorTop;
use App\Article;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {

    	$catigories = CatigorTop::get();
    	$sitebar = Article::where('visible',1)->orderByDesc('id')->limit(10)->get();

    	foreach($sitebar as $option) {
    		foreach ($catigories as $catigor) {
    			if($option->id_catigories == $catigor->id) {
    				$option->catigor = $catigor->title;
    			}
    		}
    	}

    	$researchs = Article::where('id_catigories', 2)->orderByDesc('id')->limit(2)->get(); //иследования
    	$technologys = Article::where('id_catigories', 3)->orderByDesc('id')->limit(2)->get(); //технологии
    	$retailAudits = Article::where('id_catigories', 4)->orderByDesc('id')->limit(2)->get(); //РОЗНИЧНЫЙ АУДИТ


    	return view('index')->with([
    		'catigories' => $catigories,
    		'sitebarArticle' => $sitebar,

    		'researchs' => $researchs,
    		'technologys' => $technologys,
    		'retailAudits' => $retailAudits
    	]);
    }
}
