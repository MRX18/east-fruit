<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Event;
use App\Yaer;
use App\Program;
use App\Speaker;
use App\Conference;
use App\Question;
use App\Answer;
use App\ConferenceMaterial;
use App\MediaReport;

class CalendarController extends Controller
{
    public function index($id) {
    	$title = "События";
        $keywords = $title.", фрукты, овощи, новости, плодоовощной рынок, аналитика, маркетинг, east-fruit, Центральная Азия, Кавказ, Восточная Европа.";
        $description = $title." - на сайте east-fruit.com";
        $catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $_event = new Event;
        $_year = new Yaer;
        $_question = new Question();
        $_answer = new Answer();

        $years = $_year->years();

        foreach($years as $year) {
            if($year->year == $id) {
                $id = $year->id;
            }
        }

        $eventEastFruit = $_event->allEvent($id, 1, 10); // east fruit
        $eventOther = $_event->allEvent($id, 2, 10); // Other

        $eventsAll = $_event->allEvents($id, 10); 

        $question = $_question->question();
        $answer = $_answer->answer($question->id);

        return view('calendar-of-events')->with([
            'title' => $title,
            'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'keywords' => $keywords,
            'description' => $description,

            'eventEastFruit' => $eventEastFruit,
            'eventOther' => $eventOther,
            'eventsAll' => $eventsAll,
            'years' => $years,

            'question' => $question,
            'answer' => $answer
        ]);
    }

    public function conference($id) {
        $title = 'О конференции';
    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $_article = new Article();
        $_event = new Event;
        $_conferense = new Conference;

        $sitebar = $_article->sitebar(10);
        $event = $_event->onceEvent($id);

        $conference = $_conferense->conference($id);
        // dd($conference);

    	return view('conference')->with([
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
        $_event = new Event;
        $_program = new Program;

        $sitebar = $_article->sitebar(10);
        $event = $_event->onceEvent($id);
        $programs = $_program->programs($id);



        $sitebar = Article::orderByDesc('id')->limit(10)->get();

    	return view('program')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'sitebarArticle' => $sitebar,

            'event' => $event,
            'programs' => $programs
    	]);
    }

    public function speakers($id) {
        $title = 'Спикеры';
    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $_article = new Article();
        $_event = new Event;
        $_speaker = new Speaker;

        $sitebar = $_article->sitebar(10);
        $event = $_event->onceEvent($id);
        $speakers = $_speaker->speacers($id);

    	return view('speakers')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'sitebarArticle' => $sitebar,

            'event' => $event,
            'speakers' => $speakers
    	]);
    }

    public function eventDay($id) {
        $title = "События | ".$this->dateFirst($id);
        $catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $_event = new Event;
        $_year = new Yaer;
        $_question = new Question();
        $_answer = new Answer();

        $years = $_year->years();

        $events = $_event->eventDаy($id, 10);

        $question = $_question->question();
        $answer = $_answer->answer($question->id);

        $id = explode('-', $id);
        $id = $id[0];
        foreach($years as $year) {
            if($year->year == $id) {
                $id = $year->id;
            }
        }
        $eventsAll = $_event->allEvents($id, 10);

        return view('calendar-of-events')->with([
            'title' => $title,
            'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,

            'events' => $events,
            'eventsAll' => $eventsAll,
            'years' => $years,

            'question' => $question,
            'answer' => $answer
        ]);
    }

    public function mediaReport($id) {
        $title = 'Медиа-отчет';
        $catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $_article = new Article();
        $_event = new Event;
        $_media_report = new MediaReport;

        $sitebar = $_article->sitebar(10);
        $event = $_event->onceEvent($id);
        $mediaReport = $_media_report->mediaReport($id);


        return view('media-report')->with([
            'title' => $title,
            'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'sitebarArticle' => $sitebar,

            'event' => $event,
            'mediaReport' => $mediaReport
        ]);
    }

    public function conferenceMaterials($id) {
        $title = 'Материалы конференции';
        $catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $_article = new Article();
        $_event = new Event;
        $_conference_material = new ConferenceMaterial;

        $sitebar = $_article->sitebar(10);
        $event = $_event->onceEvent($id);
        $conferenceMaterial = $_conference_material->conferenceMaterial($id);


        return view('conference-materials')->with([
            'title' => $title,
            'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'sitebarArticle' => $sitebar,

            'event' => $event,
            'conferenceMaterial' => $conferenceMaterial
        ]);
    }
}
