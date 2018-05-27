<?php

namespace App\Http\Controllers;
use App\Article;
use App\Image;
use App\Answer;
use App\Research;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function index() {
    	$title = "Главная";
        $keywords = "фрукты, овощи, новости, плодоовощной рынок, аналитика, маркетинг, east-fruit, Центральная Азия, Кавказ, Восточная Европа.";
        $description = "Информация о рынках овощей и фруктов на восток от Евросоюза";
    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $_article = new Article();
        $_image = new Image();
        $_research = new Research();

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
        $researchs = $_research->allResearch(2);

    	//технологии
        $technologys = $_article->articleInIndexPage('id_catigories', 3, 2);

    	//РОЗНИЧНЫЙ АУДИТ
        $retailAudits = $_article->articleInIndexPage('id_catigories', 4, 2);

        // Интервю
        $interview = $_article->articleInIndexPage('id_catigories', 6, 10);


        //ИСТОРИИ БИЗНЕСА
        $stories = $_article->lineIndex('id_catigories', 9);

        //РЕЙТИНГИ
        $rating = $_article->lineIndex('id_catigories', 5);

        //НОВОСТИ
        $new = $_article->lineIndex('id_catigories', 1);






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
            'keywords' => $keywords,
            'description' => $description,

    		'sitebarArticle' => $sitebar,
            'sitebarAdaptive' => $sitebarAdaptive,

            'slider' => $slider,
            'topSlider' => $topSlider,
            'line' => $line,

    		'researchs' => $researchs,
    		'technologys' => $technologys,
    		'retailAudits' => $retailAudits,
            'interview' => $interview,
            'stories' => $stories,
            'rating' => $rating,
            'new' => $new,

            'articles' => $articles,
            'images' => $images,
            'imagesM' => $imagesM
    	]);
    }

    public function question(Request $request) {
        if($request->isMethod('post')) {
            $idAnswer = array();

            foreach($request->all() as $key => $value) {
                $idAnswer[] = $value;
            }
            //unset($idAnswer[0]);
            foreach($idAnswer as $id) {
                $count = Answer::where('id', $id)->value('count');
                $count++;
                Answer::where('id', $id)->update(array('count' => $count));
            }
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
