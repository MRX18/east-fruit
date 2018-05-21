<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Question;
use App\Answer;

class SearchController extends Controller
{
    public function index() {
    	$title = "Поиск";
        $keywords = "фрукты, овощи, новости, плодоовощной рынок, аналитика, маркетинг, east-fruit, Центральная Азия, Кавказ, Восточная Европа.";
        $description = "Информация о рынках овощей и фруктов на восток от Евросоюза";
    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

    	$_article = new Article;
        $_question = new Question();
        $_answer = new Answer();

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

        $question = $_question->question();
        $answer = $_answer->answer($question->id);

    	return view('search')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'keywords' => $keywords,
            'description' => $description,

            'search' => $search,
            'count' => $count,
    		'articles' => $articles,

            'question' => $question,
            'answer' => $answer
    	]);
    }
}
