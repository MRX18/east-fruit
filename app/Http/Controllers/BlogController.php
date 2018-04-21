<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class BlogController extends Controller
{
    public function index() {
    	$title = "Главная";
    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $sitebar = Article::orderByDesc('id')->limit(10)->get();

    	return view('blog')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'sitebarArticle' => $sitebar
    	]);
    }

    public function article() {
    	$title = "Главная";
    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $sitebar = Article::orderByDesc('id')->limit(10)->get();

    	return view('articles-blog')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'sitebarArticle' => $sitebar
    	]);
    }
}
