<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Article;
use App\ArticlesComment;
use App\User;

class ArticleController extends Controller
{
    public function index(Request $request, $id) {

        $addComment = false;

    	if($request->isMethod('post')) {
            if(!Auth::check()) {
                $validator = Validator::make($request->all(),
                    array(
                        'name' => 'required|between:3,16',
                        'email' => 'required|email|max:32',
                        'comment' => 'required|between:4,500'
                    )
                );
            } else {
                $validator = Validator::make($request->all(),
                    array(
                        'comment' => 'required|between:4,500'
                    )
                );
            }
            $time = date('H:i');
            $date = date('d.m.Y');

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator->errors());
            } else {
                if(!Auth::check()) {
                    ArticlesComment::insert(['id_articles' => $id, 'user' => $request->name, 'email' => $request->email, 'time' => $time, 'date' => $date, 'text' => $request->comment]);
                } else {
                    $idUser = Auth::user()->id;
                    $user = User::where('id', $idUser)->first();
                    ArticlesComment::insert(['id_articles' => $id, 'user' => $user->name, 'email' => $user->email, 'time' => $time, 'date' => $date, 'text' => $request->comment, 'img'=>$user->img]);
                }

                $addComment = true;
                return redirect()->route('article', ['id'=>$id])->with('addComment', $addComment);
            }

        }


    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

    	$_article = new Article();
        $sitebar = $_article->sitebar(10);

    	foreach($sitebar as $option) {
    		foreach ($catigories as $catigor) {
    			if($option->id_catigories == $catigor->id) {
    				$option->catigor = $catigor->title;
    			}
    		}
    	}

    	$article = $_article->article($id);

    	$title = $article->title;

    	foreach($catigories as $catigor) {
    		if($catigor->id == $article->id_catigories) {
    			$article->catigor = $catigor->title;
    		}
    	}

        $read = $_article->articleCatigor($article->id_catigories, 10);

    	$comments = ArticlesComment::where('id_articles', $id)
            ->where('visible', 1)
            ->orderByDesc('id')
            ->get();



    	return view('articles')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
    		'sitebarArticle' => $sitebar,

    		'article' => $article,
    		'reads' => $read,
    		'comments' => $comments
    	]);
    }
}
