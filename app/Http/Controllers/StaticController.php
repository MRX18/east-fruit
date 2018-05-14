<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Article;
use App\Application;

class StaticController extends Controller
{
    public function about() {
    	$title = "О проекте";
        $keywords = "О проекте, информация о сайте, фрукты, овощи, новости, плодоовощной рынок, аналитика, маркетинг, east-fruit, Центральная Азия, Кавказ, Восточная Европа.";
        $description = "Информация о сайте.";

    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();
    	$sitebar = Article::orderByDesc('id')->limit(10)->get();

    	return view('about')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'keywords' => $keywords,
            'description' => $description,
    		'sitebarArticle' => $sitebar
    	]);
    }

    public function cooperation() {
    	$title = "Сотрудничество";
        $keywords = "Сотрудничество, фрукты, овощи, новости, плодоовощной рынок, аналитика, маркетинг, east-fruit, Центральная Азия, Кавказ, Восточная Европа.";
        $description = "Информация о сотрудниках проекта east fruit.";

    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();
    	$sitebar = Article::orderByDesc('id')->limit(10)->get();

    	return view('cooperation')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'keywords' => $keywords,
            'description' => $description,
    		'sitebarArticle' => $sitebar
    	]);
    }

    public function contact(Request $request) {
    	$title = "Контакты";
        $keywords = "Контакты, фрукты, овощи, новости, плодоовощной рынок, аналитика, маркетинг, east-fruit, Центральная Азия, Кавказ, Восточная Европа.";
        $description = "Здесь вы можете оставить свою заявку на сайте.";
        $addApplications = false;

        if($request->isMethod('post')) {

            $validator = Validator::make($request->all(),
                array(
                    'name' => 'required|between:3,16',
                    'email' => 'required|email|max:32',
                    'text' => 'required|between:4,500'
                )
            );

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator->errors());
            } else {
                Application::insert(['name' => $request->name, 'email' => $request->email, 'text' => $request->text]);

                $addApplications = true;
            }
        }

    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();
    	$sitebar = Article::orderByDesc('id')->limit(10)->get();

    	return view('contact')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'keywords' => $keywords,
            'description' => $description,
    		'sitebarArticle' => $sitebar,

            'addApplications' => $addApplications
    	]);
    }
    
    public function regulations() {
    	$title = "Правила использоваия материалов";
        $keywords = "Правила использоваия материалов, фрукты, овощи, новости, плодоовощной рынок, аналитика, маркетинг, east-fruit, Центральная Азия, Кавказ, Восточная Европа.";
        $description = "Правила использоваия материалов сайта.";

    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();
    	$sitebar = Article::orderByDesc('id')->limit(10)->get();

    	return view('regulations')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'keywords' => $keywords,
            'description' => $description,
    		'sitebarArticle' => $sitebar
    	]);
    }
    
}
