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
        $_article = new Article();
        $_blog = new Blog();
        $_user = new User();

        $auth = false;
        $idUser = 0;
        if(Auth::check()) {
            $auth = true;
            $idUser = Auth::user()->id;

            if($request->isMethod('post')){

                $validator = Validator::make($request->all(),
                    array(
                        'name' => 'between:4,32',
                        'position' => 'between:3,32',
                        'img' => 'image'
                    )
                );

                if($validator->fails()) {
                    return redirect()->back()->withInput()->withErrors($validator->errors());
                } else {

                    foreach ($request->file() as $file) {
                        $file->move(public_path() . '/images/user', $file->getClientOriginalName());
                        User::where('id', $idUser)->update(array('img' => '/images/user/'.$file->getClientOriginalName()));
                    }
                    User::where('id', $idUser)->update(array('name'=>$request->name, 'position'=>$request->position));
                    return redirect()->back();

                }
             }
        }
        $user = $_user->user($idUser);


    	$title = "Блог";
    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $articles = $_blog->allArticlesBlog(20);
        foreach($articles as $article) {
            $article->date = $this->dateFirst($article->date);

            $users = $_user->user($article->id_user);
            $article->name_user = $users->name;
            $article->img_user = $users->img;
        }

        $sitebar = $_article->sitebar(10);

        //иследования
        $researchs = $_article->articleInIndexPage('id_catigories', 2, 2);

        //технологии
        $technologys = $_article->articleInIndexPage('id_catigories', 3, 2);

        //РОЗНИЧНЫЙ АУДИТ
        $retailAudits = $_article->articleInIndexPage('id_catigories', 4, 2);

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
        $_article = new Article();
        $_blog = new Blog();
        $_user = new User();

        $auth = false;
        $idUser = 0;
        if(Auth::check()) {
            $auth = true;
            $idUser = Auth::user()->id;

            if($request->isMethod('post')){

                $validator = Validator::make($request->all(),
                    array(
                        'name' => 'between:4,32',
                        'position' => 'between:3,32',
                        'img' => 'image'
                    )
                );

                if($validator->fails()) {
                    return redirect()->back()->withInput()->withErrors($validator->errors());
                } else {

                    foreach ($request->file() as $file) {
                        $file->move(public_path() . '/images/user', $file->getClientOriginalName());
                        User::where('id', $idUser)->update(array('img' => '/images/user/'.$file->getClientOriginalName()));
                    }
                    User::where('id', $idUser)->update(array('name'=>$request->name, 'position'=>$request->position));
                    return redirect()->back();

                }
             }
        }
        $user = $_user->user($idUser);

    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $sitebar = $_article->sitebar(10);

        $article = $_blog->oneArticle($id);

        $comment = BlogComment::where('id_blog', $id)->orderByDesc('id')->get();
        $reads = Article::orderByDesc('id')->limit(10)->get();
        foreach($reads as $read) {
            $read->date = $this->dateFirst($read->date);
        }

        $title = $article->title;
        $article->date = $this->dateFirst($article->date);
        $author = $_user->user($article->id_user);

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
        $_article = new Article();
        $_user = new User();


        $auth = false;
        $idUser = 0;
        if(Auth::check()) {
            $auth = true;
            $idUser = Auth::user()->id;

            if($request->isMethod('post')){

                $validator = Validator::make($request->all(),
                    array(
                        'name' => 'between:4,32',
                        'position' => 'between:3,32',
                        'img' => 'image'
                    )
                );

                if($validator->fails()) {
                    return redirect()->back()->withInput()->withErrors($validator->errors());
                } else {

                    foreach ($request->file() as $file) {
                        $file->move(public_path() . '/images/user', $file->getClientOriginalName());
                        User::where('id', $idUser)->update(array('img' => '/images/user/'.$file->getClientOriginalName()));
                    }
                    User::where('id', $idUser)->update(array('name'=>$request->name, 'position'=>$request->position));
                    return redirect()->back();

                }
             }
        } else {
            return redirect()->back();
        }
        $user = $_user->user($idUser);


        $title = "Добавить статью";
        $catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();
        $sitebar = $_article->sitebar(10);


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
