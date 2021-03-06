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
use App\Occupation;

class BlogController extends Controller
{
    public function index(Request $request) {
        $_article = new Article();
        $_blog = new Blog();
        $_user = new User();
        $_occupation = new Occupation;

        $occupation = $_occupation->allOccupation();

        $auth = false;
        $idUser = 0;
        if(Auth::check()) {
            $auth = true;
            $idUser = Auth::user()->id;

            if($request->isMethod('post')){

                $validator = Validator::make($request->all(),
                    array(
                        'name' => 'between:4,32',
                        'positionSelect' => 'required|integer',
                        'position' => 'string|between:2,128',
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
                    if($request->positionSelect == 9999) {
                        User::where('id', $idUser)->update(array('id_occupation' =>0,'name'=>$request->name, 'position'=>$request->position));
                    } else {
                        User::where('id', $idUser)->update(array('id_occupation' =>$request->positionSelect, 'name'=>$request->name, 'position'=>$request->position));
                    }
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

    	return view('blog')->with([
    		'title' => $title,
    		'catigories' => $catigories,
            'otherCatigorTop' => $otherCatigorTop,
            'sitebarArticle' => $sitebar,

            'articles' => $articles,

            'occupations' => $occupation,

            'auth' => $auth,
            'user' => $user
    	]);
    }

    public function article(Request $request, $id) {
        $_article = new Article();
        $_blog = new Blog();
        $_user = new User();
        $_occupation = new Occupation;

        $occupation = $_occupation->allOccupation();

        $auth = false;
        $idUser = 0;
        if(Auth::check()) {
            $auth = true;
            $idUser = Auth::user()->id;

            if($request->isMethod('post')){

                $validator = Validator::make($request->all(),
                    array(
                        'name' => 'between:4,32',
                        'positionSelect' => 'required|integer',
                        'position' => 'string|between:2,128',
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
                    if($request->positionSelect == 9999) {
                        User::where('id', $idUser)->update(array('id_occupation' =>0,'name'=>$request->name, 'position'=>$request->position));
                    } else {
                        User::where('id', $idUser)->update(array('id_occupation' =>$request->positionSelect, 'name'=>$request->name, 'position'=>$request->position));
                    }
                    return redirect()->back();

                }
            }
        }
        $user = $_user->user($idUser);

    	$catigories = $this->catigorTop();
        $otherCatigorTop = $this->otherCatigorTop();

        $sitebar = $_article->sitebar(10);

        $article = $_blog->oneArticleSlug($id);


        $comments = BlogComment::where('id_blog', Blog::where('slug',$id)->value('id'))->orderByDesc('id')->get();
        $countComments = count($comments);

        foreach ($comments as $comment) {
            $comment->children = $comments->where('parent_id', $comment->id)->all();
            $comment->delete_blog = true;
        }

        $comments = $comments->where('parent_id', null)->all();
        $html = $this->comments($comments);


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
            'occupations' => $occupation,

            'article' => $article,
            'comment' => $html,
            'countComments' => $countComments,
            'author' => $author,
            'reads' => $reads
    	]);
    }

    public function comments($comments) {
        $html = "<div id=\"w1\" class=\"new-comments\">";
        foreach($comments as $comment) {
            $html .= view('includes.comment')->with(['comment' => $comment])->render();
            if(count($comment->children) > 0) {
                $html .= $this->comments($comment->children);
            }
        }
        $html .= "</div>";

        return $html;
    }

    public function deleteComment($id) {
        if(Auth::user()->email == BlogComment::where('id', $id)->value('email')) {
            BlogComment::where('id', $id)->delete();
            BlogComment::where('parent_id', $id)->delete();
        }
        return redirect()->back();
    }

    public function addcomment(Request $request, $id) {

        if($request->isMethod('post')) {
            if(Auth::check()) {
                $validator = Validator::make($request->all(),
                    array(
                        'comment' => 'required'
                    )
                );
            }
//|between:4,500
            $time = date('H:i');
            $date = date('d.m.Y');

            if($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator->errors());
            } else {

                if(Auth::check()) {
                    $idUser = Auth::user()->id;
                    $user = User::where('id', $idUser)->first();
                    BlogComment::insert(['id_blog' => $id, 'parent_id' => $request->parent_id, 'user' => $user->name, 'email' => $user->email, 'time' => $time, 'date' => $date, 'text' => $request->comment, 'img'=>$user->img]);
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
        $_occupation = new Occupation;

        $occupation = $_occupation->allOccupation();


        $auth = false;
        $idUser = 0;
        if(Auth::check()) {
            $auth = true;
            $idUser = Auth::user()->id;

            if($request->isMethod('post')){

                $validator = Validator::make($request->all(),
                    array(
                        'name' => 'between:4,32',
                        'positionSelect' => 'required|integer',
                        'position' => 'string|between:2,128',
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
                    if($request->positionSelect == 9999) {
                        User::where('id', $idUser)->update(array('id_occupation' =>0,'name'=>$request->name, 'position'=>$request->position));
                    } else {
                        User::where('id', $idUser)->update(array('id_occupation' =>$request->positionSelect, 'name'=>$request->name, 'position'=>$request->position));
                    }
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
            'auth' => $auth,
            'occupations' => $occupation
        ]);
    }

    public function addartblog(Request $request) {
        if($request->isMethod('post')) {

            if(Auth::check()) {
                $validator = Validator::make($request->all(),
                    array(
                        'title' => 'required|between:4,256',
                        'article' => 'required'
                    )
                );
                $date = date('Y-m-d');
                $slug = str_slug($request->title);

                if($validator->fails()) {
                    return redirect()->back()->withInput()->withErrors($validator->errors());
                } else {
                    $idUser = Auth::user()->id;

                    Blog::insert(['id_user'=>$idUser, 'title'=>$request->title, 'slug'=>$slug, 'text'=>$request->article, 'date'=>$date]);

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
