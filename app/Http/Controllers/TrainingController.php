<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\Question;
use App\Answer;

use App\Training;
use App\TrainingEvent;
use App\TrainingProgram;
use App\TrainingOrganizer;
use App\TrainingMap;

class TrainingController extends Controller
{
    public function index() {
    	$title = "Обучающие поездки";
        $keywords = $title.", фрукты, овощи, новости, плодоовощной рынок, аналитика, маркетинг, east-fruit, Центральная Азия, Кавказ, Восточная Европа.";
        $description = $title." - на сайте east-fruit.com";
        $catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $_training = new Training;
        $_question = new Question();
        $_answer = new Answer();


        $events = $_training->allTraning(10);
        $question = $_question->question();
        $answer = $_answer->answer($question->id);

        return view('training')->with([
            'title' => $title,
            'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'keywords' => $keywords,
            'description' => $description,

            'events' => $events,

            'question' => $question,
            'answer' => $answer
        ]);
    }

    public function event($id) {
    	$title = 'О мероприятии';
    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $_article = new Article();
        $_event = new Training;
        $_conferense = new TrainingEvent;

        $sitebar = $_article->sitebar(10);
        $event = $_event->onceTraining($id);

        $conference = $_conferense->event($id); // мероприятие

    	return view('training-event')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'sitebarArticle' => $sitebar,

            'conference' => $conference,
            'event' => $event
    	]);
    }

    public function program($id) {
        $title = 'Программа';
    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $_article = new Article();
        $_event = new Training;
        $_program = new TrainingProgram;

        $sitebar = $_article->sitebar(10);
        $event = $_event->onceTraining($id);
        $programs = $_program->program($id);



        $sitebar = Article::orderByDesc('id')->limit(10)->get();

    	return view('training-program')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'sitebarArticle' => $sitebar,

            'event' => $event,
            'programs' => $programs
    	]);
    }

    public function organizer($id) {
        $title = 'Организаторы';
    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $_article = new Article();
        $_event = new Training;
        $_speaker = new TrainingOrganizer;

        $sitebar = $_article->sitebar(10);
        $event = $_event->onceTraining($id);
        $speakers = $_speaker->organizer($id);

    	return view('training-organizer')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'sitebarArticle' => $sitebar,

            'event' => $event,
            'speakers' => $speakers
    	]);
    }

    public function map($id) {
    	$title = 'Место проведения';
    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $_article = new Article();
        $_event = new Training;
        $_conferense = new TrainingMap;

        $sitebar = $_article->sitebar(10);
        $event = $_event->onceTraining($id);

        $conference = $_conferense->map($id); // место проведения

    	return view('training-map')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'sitebarArticle' => $sitebar,

            'conference' => $conference,
            'event' => $event
    	]);
    }
}
