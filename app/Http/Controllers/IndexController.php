<?php

namespace App\Http\Controllers;
use App\Article;
use App\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function index() {
    	$title = "Главная";
    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $_article = new Article();
        $_image = new Image();

        $sitebar = $_article->sitebar(17);
        $sitebarAdaptive =$_article->sitebar(5);


        $slider = $_article->articleInIndexPage('baner', 1, 3);

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

        $topSlider = $_article->articleInIndexPage('toptwenty', 1, 20);

        $line = $_article->lineIndex('line', 1);


        //иследования
        $researchs = $_article->articleInIndexPage('id_catigories', 2, 2);

    	//технологии
        $technologys = $_article->articleInIndexPage('id_catigories', 3, 2);

    	//РОЗНИЧНЫЙ АУДИТ
        $retailAudits = $_article->articleInIndexPage('id_catigories', 4, 2);

        // Интервю
        $interview = $_article->articleInIndexPage('id_catigories', 6, 10);

        $articles = $_article->allArticles(9);

        $images = $_image->images(18);
        $imagesM = $_image->images(9);

        foreach($articles as $option) {
            foreach ($catigories as $catigor) {
                if($option->id_catigories == $catigor->id) {
                    $option->catigor = $catigor->title;
                }
            }
        }


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
            'interview' => $interview,
            'articles' => $articles,
            'images' => $images,
            'imagesM' => $imagesM
    	]);
    }

    public function question(Request $request) {
        if($request->isMethod('post')) {
            dd($request->all());
        } else {

        }
    }
}
