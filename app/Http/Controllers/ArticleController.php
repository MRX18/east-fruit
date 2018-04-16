<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\CatigorTop;
use App\Article;
use App\ArticlesComment;

class ArticleController extends Controller
{
    public function index(Request $request, $id) {


    	if($request->isMethod('post')) {

    		dump($request->all());

            // $validator = Validator::make($request->all(),
            //     array(
            //         'name' => 'required|between:4,16',
            //         'email' => 'required|email|max:32',
            //         'comment' => 'required|between:4,500'
            //     )
            // );
            // $time = date('H:i');
            // $date = date('d.m.Y');

            // if($validator->fails()) {
            //     return redirect()->back()->withInput()->withErrors($validator->errors());
            // } else {
            //     BlogComment::insert(['id_blog' => $id, 'name' => $request->name, 'email' => $request->email, 'time' => $time, 'date' => $date, 'text' => $request->comment]);
            // }

        }


    	$title = "Главная";

    	$catigories = CatigorTop::get();
    	$sitebar = Article::where('visible',1)->orderByDesc('id')->limit(10)->get();

    	foreach($sitebar as $option) {
    		foreach ($catigories as $catigor) {
    			if($option->id_catigories == $catigor->id) {
    				$option->catigor = $catigor->title;
    			}
    		}
    	}

    	$article = Article::where('id', $id)->first();

    	$title = $article->title;

    	foreach($catigories as $catigor) {
    		if($catigor->id == $article->id_catigories) {
    			$article->catigor = $catigor->title;
    		}
    	}

    	$read = Article::where('id_catigories', $article->id_catigories)->orderByDesc('id')->get();

    	$comments = ArticlesComment::where('id_articles', $id)->orderByDesc('id')->get();



    	return view('articles')->with([
    		'title' => $title,
    		'catigories' => $catigories,
    		'sitebarArticle' => $sitebar,

    		'article' => $article,
    		'reads' => $read,
    		'comments' => $comments
    	]);
    }
}
