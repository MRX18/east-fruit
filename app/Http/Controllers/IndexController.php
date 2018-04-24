<?php

namespace App\Http\Controllers;
use App\CatigorTop;
use App\Article;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
    	$title = "Главная";

    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();
    	$sitebar = Article::orderByDesc('id')->limit(10)->get();
        $sitebarAdaptive = Article::orderByDesc('id')->limit(5)->get();

        $slider = Article::where('baner',1)->orderByDesc('id')->limit(3)->get();

    	foreach($sitebar as $option) {
    		foreach ($catigories as $catigor) {
    			if($option->id_catigories == $catigor->id) {
    				$option->catigor = $catigor->title;
    			}
    		}
    	}

        foreach($sitebarAdaptive as $option) {
            foreach ($catigories as $catigor) {
                if($option->id_catigories == $catigor->id) {
                    $option->catigor = $catigor->title;
                }
            }
        }

        $topSlider = Article::where('toptwenty',1)->orderByDesc('id')->limit(20)->get();

        $line = Article::where('line',1)->orderByDesc('id')->first();


    	$researchs = Article::where('id_catigories', 2)->orderByDesc('id')->limit(2)->get(); //иследования
    	$technologys = Article::where('id_catigories', 3)->orderByDesc('id')->limit(2)->get(); //технологии
    	$retailAudits = Article::where('id_catigories', 4)->orderByDesc('id')->limit(2)->get(); //РОЗНИЧНЫЙ АУДИТ
        $interview = Article::where('id_catigories', 6)->orderByDesc('id')->limit(10)->get(); // Интервю


    	return view('index')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
    		'sitebarArticle' => $sitebar,
            'sitebarAdaptive' => $sitebarAdaptive,

            'slider' => $slider,
            'topSlider' => $topSlider,
            'line' => $line,

    		'researchs' => $researchs,
    		'technologys' => $technologys,
    		'retailAudits' => $retailAudits,
            'interview' => $interview
    	]);
    }
}
