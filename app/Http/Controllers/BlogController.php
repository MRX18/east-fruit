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

        $researchs = Article::where('id_catigories', 2)->orderByDesc('id')->limit(5)->get(); //иследования
        $technologys = Article::where('id_catigories', 3)->orderByDesc('id')->limit(5)->get(); //технологии
        $retailAudits = Article::where('id_catigories', 4)->orderByDesc('id')->limit(5)->get(); //РОЗНИЧНЫЙ АУДИТ

    	return view('blog')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'sitebarArticle' => $sitebar,

            'researchs' => $researchs,
            'technologys' => $technologys,
            'retailAudits' => $retailAudits
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
