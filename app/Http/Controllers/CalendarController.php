<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class CalendarController extends Controller
{
    public function index() {
    	$title = "Все статьи";
        $catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();



        return view('calendar-of-events')->with([
            'title' => $title,
            'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
        ]);
    }

    public function conference() {
        $title = 'О конференции';
    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $sitebar = Article::orderByDesc('id')->limit(10)->get();

    	return view('conference')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'sitebarArticle' => $sitebar
    	]);
    }

    public function program() {
        $title = 'Программа';
    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $sitebar = Article::orderByDesc('id')->limit(10)->get();

    	return view('program')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'sitebarArticle' => $sitebar
    	]);
    }

    public function speakers() {
        $title = 'Спикеры';
    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $sitebar = Article::orderByDesc('id')->limit(10)->get();

    	return view('speakers')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'sitebarArticle' => $sitebar
    	]);
    }
}
