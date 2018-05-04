<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class SearchController extends Controller
{
    public function index() {
    	$title = "Поиск";
    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

    	$_article = new Article;

    	$search = $_GET['s'];

    	$articles = $_article->search($search, 24);
    	$count = count($articles);

    	foreach($articles as $option) {
    		foreach ($catigories as $catigor) {
    			if($option->id_catigories == $catigor->id) {
    				$option->catigor = $catigor->title;
    			}
    		}
    	}

    	return view('search')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,

            'search' => $search,
            'count' => $count,
    		'articles' => $articles
    	]);
    }
}
