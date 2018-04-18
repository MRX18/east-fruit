<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class StaticController extends Controller
{
    public function about() {
    	$title = "О проекте";

    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();
    	$sitebar = Article::orderByDesc('id')->limit(10)->get();

    	return view('about')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
    		'sitebarArticle' => $sitebar
    	]);
    }

    public function cooperation() {
    	$title = "Сотрудничество";

    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();
    	$sitebar = Article::orderByDesc('id')->limit(10)->get();

    	return view('cooperation')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
    		'sitebarArticle' => $sitebar
    	]);
    }

    public function contact() {
    	$title = "Контакты";

    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();
    	$sitebar = Article::orderByDesc('id')->limit(10)->get();

    	return view('contact')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
    		'sitebarArticle' => $sitebar
    	]);
    }
    
    public function regulations() {
    	$title = "Правила использоваия материалов";

    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();
    	$sitebar = Article::orderByDesc('id')->limit(10)->get();

    	return view('regulations')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
    		'sitebarArticle' => $sitebar
    	]);
    }
    
}
