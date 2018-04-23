<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;

use App\Article;
use App\Blog;
use App\User;
use App\BlogComment;

class BlogController extends Controller
{
    public function index(Request $request) {
        $auth = false;
        $idUser = 0;
        if(Auth::check()) {
            $auth = true;
            $idUser = Auth::user()->id;

            if($request->isMethod('post')){

                $validator = Validator::make($request->all(),
                    array(
                        'img' => 'required|image'
                    )
                );

                if($validator->fails()) {
                    return redirect()->back()->withInput()->withErrors($validator->errors());
                } else {

                    foreach ($request->file() as $file) {
                        $file->move(public_path() . '/images/user', $file->getClientOriginalName());
                        User::where('id', $idUser)->update(array('img' => '/images/user/'.$file->getClientOriginalName()));
                    }
                    return redirect()->back();

                }
             }
        }
        $user = User::where('id', $idUser)->first();


    	$title = "Блог";
    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $articles = Blog::where('visible', 1)->orderByDesc('id')->paginate(20);
        foreach($articles as $article) {
            $article->date = $this->date($article->date);

            $users = User::where('id', $article->id_user)->first();
            $article->name_user = $users->name;
            $article->img_user = $users->img;
        }

        $sitebar = Article::orderByDesc('id')->limit(10)->get();

        $researchs = Article::where('id_catigories', 2)->orderByDesc('id')->limit(5)->get(); //иследования
        $technologys = Article::where('id_catigories', 3)->orderByDesc('id')->limit(5)->get(); //технологии
        $retailAudits = Article::where('id_catigories', 4)->orderByDesc('id')->limit(5)->get(); //РОЗНИЧНЫЙ АУДИТ

    	return view('blog')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'sitebarArticle' => $sitebar,

            'articles' => $articles,

            'researchs' => $researchs,
            'technologys' => $technologys,
            'retailAudits' => $retailAudits,

            'auth' => $auth,
            'user' => $user
    	]);
    }

    public function article(Request $request, $id) {

        $auth = false;
        $idUser = 0;
        if(Auth::check()) {
            $auth = true;
            $idUser = Auth::user()->id;

            if($request->isMethod('post')){

                $validator = Validator::make($request->all(),
                    array(
                        'img' => 'required|image'
                    )
                );

                if($validator->fails()) {
                    return redirect()->back()->withInput()->withErrors($validator->errors());
                } else {

                    foreach ($request->file() as $file) {
                        $file->move(public_path() . '/images/user', $file->getClientOriginalName());
                        User::where('id', $idUser)->update(array('img' => '/images/user/'.$file->getClientOriginalName()));
                    }
                    return redirect()->back();
                }
             }
        }
        $user = User::where('id', $idUser)->first();

    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $sitebar = Article::orderByDesc('id')->limit(10)->get();

        $article = Blog::where('id', $id)->first();
        $comment = BlogComment::where('id_blog', $id)->orderByDesc('id')->get();
        $reads = Article::orderByDesc('id')->limit(10)->get();
        foreach($reads as $read) {
            $read->date = $this->date($read->date);
        }

        $title = $article->title;
        $article->date = $this->date($article->date);
        $author = User::where('id', $article->id_user)->first();

    	return view('articles-blog')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'sitebarArticle' => $sitebar,
            'auth' => $auth,
            'user' => $user,

            'article' => $article,
            'comment' => $comment,
            'author' => $author,
            'reads' => $reads
    	]);
    }

    public function addcomment(Request $request, $id) {

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
                    BlogComment::insert(['id_blog' => $id, 'user' => $request->name, 'email' => $request->email, 'time' => $time, 'date' => $date, 'text' => $request->comment]);
                } else {
                    $idUser = Auth::user()->id;
                    $user = User::where('id', $idUser)->first();
                    BlogComment::insert(['id_blog' => $id, 'user' => $user->name, 'email' => $user->email, 'time' => $time, 'date' => $date, 'text' => $request->comment, 'img'=>$user->img]);
                }

                $addComment = true;
                return redirect()->back()->with('addComment', $addComment);
            }
        } else {
            return redirect()->back();
        }

    }

    public function addblog(Request $request) {

        $auth = false;
        $idUser = 0;
        if(Auth::check()) {
            $auth = true;
            $idUser = Auth::user()->id;

            if($request->isMethod('post')){

                $validator = Validator::make($request->all(),
                    array(
                        'img' => 'required|image'
                    )
                );

                if($validator->fails()) {
                    return redirect()->back()->withInput()->withErrors($validator->errors());
                } else {

                    foreach ($request->file() as $file) {
                        $file->move(public_path() . '/images/user', $file->getClientOriginalName());
                        User::where('id', $idUser)->update(array('img' => '/images/user/'.$file->getClientOriginalName()));
                    }
                    return redirect()->back();

                }
             }
        } else {
            return redirect()->back();
        }
        $user = User::where('id', $idUser)->first();


        $title = "Добавить статью";
        $catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();
        $sitebar = Article::orderByDesc('id')->limit(5)->get();


        return view('addblog')->with([
            'title' => $title,
            'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'sitebarArticle' => $sitebar,
            'user' => $user,
            'auth' => $auth
        ]);
    }

    public function addartblog(Request $request) {
        if($request->isMethod('post')) {

            if(Auth::check()) {
                $validator = Validator::make($request->all(),
                    array(
                        'title' => 'required|between:4,256',
                        'article' => 'required|between:4,500'
                    )
                );
                $date = date('Y-m-d');

                if($validator->fails()) {
                    return redirect()->back()->withInput()->withErrors($validator->errors());
                } else {
                    $idUser = Auth::user()->id;

                    Blog::insert(['id_user'=>$idUser, 'title'=>$request->title, 'text'=>$request->article, 'date'=>$date]);

                    $addComment = true;
                    return redirect()->back()->with('addComment', $addComment);
                }
            } else {
                return redirect()->back();
            }

        } else {
            return redirect()->back();
        }
    }

}
