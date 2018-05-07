<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Event;
use App\Yaer;
use App\Program;
use App\Speaker;
use App\Conference;

class CalendarController extends Controller
{
    public function index($id) {
    	$title = "События";
        $catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $_event = new Event;
        $_year = new Yaer;

        $years = $_year->years();

        foreach($years as $year) {
            if($year->year == $id) {
                $id = $year->id;
            }
        }

        $events = $_event->allEvent($id, 10);

        return view('calendar-of-events')->with([
            'title' => $title,
            'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,

            'events' => $events,
            'years' => $years
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

        $years = $_year->years();

        $events = $_event->eventDаy($id, 10);

        return view('calendar-of-events')->with([
            'title' => $title,
            'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,

            'events' => $events,
            'years' => $years
        ]);
    }
}
