<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CatigorTop;
use App\Article;
use App\Question;
use App\Answer;
use App\Research;
use App\ResearchContent;

class ResearchController extends Controller
{
    public function index() {
        $title = "Исследования";
        $catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $keywords = $title.", фрукты, овощи, новости, плодоовощной рынок, аналитика, маркетинг, east-fruit, Центральная Азия, Кавказ, Восточная Европа.";
        $description = $title." - на сайте east-fruit.com";

        $_article = new Article();
        $_research = new Research();
        $_question = new Question();
        $_answer = new Answer();

        $articles = $_research->allResearch(24);

        foreach($articles as $article) {
            $article->id_cont = ResearchContent::where('id_research', $article->id)->orderBy('id')->value('slug');
        }

        $slider = $_article->articleInIndexPage('baner', 1, 3);


        $question = $_question->question();
        $answer = $_answer->answer($question->id);

        return view('researches')->with([
            'title' => $title,
            'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'keywords' => $keywords,
            'description' => $description,

            'slider' => $slider,

            'articles' => $articles,

            'question' => $question,
            'answer' => $answer
        ]);
    }

    public function greatResearch($id) {
        $catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $_article = new Article();
        $_research = new Research();
        $_research_content = new ResearchContent();
        $_question = new Question();
        $_answer = new Answer();

        $articles = $_research->research($id);
        $articlesContent = $_research_content->allResearchContent($articles->id);


        $question = $_question->question();
        $answer = $_answer->answer($question->id);

        $title = $articles->title;
        $keywords = $title.", фрукты, овощи, новости, плодоовощной рынок, аналитика, маркетинг, east-fruit, Центральная Азия, Кавказ, Восточная Европа.";
        $description = $title." - на сайте east-fruit.com";

        return view('great-research')->with([
            'title' => $title,
            'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'keywords' => $keywords,
            'description' => $description,

            'articles' => $articles,
            'articlesContent' => $articlesContent,

            'question' => $question,
            'answer' => $answer
        ]);
    }

    public function research($id) {
        $catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $_article = new Article();
        $_research = new Research();
        $_research_content = new ResearchContent();
        $_question = new Question();
        $_answer = new Answer();

        $articlesContent = $_research_content->onceResearchContent($id);
        $articles = $_research->researchArticle($articlesContent->id_research);

        $sitebar = $_article->sitebar(10);

        $question = $_question->question();
        $answer = $_answer->answer($question->id);

        $title = $articles->title;
        $keywords = $title.", фрукты, овощи, новости, плодоовощной рынок, аналитика, маркетинг, east-fruit, Центральная Азия, Кавказ, Восточная Европа.";
        $description = $title." - на сайте east-fruit.com";

        return view('research-content')->with([
            'title' => $title,
            'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'keywords' => $keywords,
            'description' => $description,

            'articles' => $articles,
            'articlesContent' => $articlesContent,

            'sitebarArticle' => $sitebar,
            'question' => $question,
            'answer' => $answer
        ]);
    }
}
