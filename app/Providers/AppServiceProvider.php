<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Event;
use App\Blog;
use App\Image;
use App\BlogComment;
use App\Banners;
use App\ArticlesComment;
use App\Article;
use App\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $_article = new Article();
        $_event = new Event();
        $_image = new Image();
        $_banners = new Banners;
        $_blog = new Blog;

        /*события в календаре*/
        $dateEvent = Event::select('date')->get();
        foreach($dateEvent as $event) {
            $date = explode('-', $event->date);
            $event->date = $date[1].'/'.$date[2].'/'.$date[0];
        }


        /*новые записи блога для сайтбара*/
        $blog = $_blog->allArticlesBlog(3);


        /*реклама на сайте*/
        $banner = $_banners->index();

        /*комментарии для сайтбара*/
        $comments = ArticlesComment::orderByDesc('id')->limit(5)->get();
        $blogComment = BlogComment::orderByDesc('id')->limit(5)->get();

        $collection = array();

        foreach($comments as $comment) {
            $articleComment = Article::where('id', $comment->id_articles)->first();

            $comment->article_title = $articleComment->title;
            $comment->article_slug = '/article/'.$articleComment->slug;

            $collection[] = $comment;
        }

        foreach($blogComment as $comment) {
            $blogComment = Blog::where('id', $comment->id_blog)->first();

            $comment->article_title = $blogComment->title;
            $comment->article_slug = '/blog/article/'.$blogComment->slug;

            $collection[] = $comment;
        }

        $comments = collect($collection);
        $comments = $comments->sortByDesc('date')->take(5);

        /*--Актуальное--*/
        $articleSitebar = $_article->sitebar(15);

        /*--Актуальное с 3 категориями--*/
        $blogСurrent  = $_blog->allArticlesBlog(2);
        foreach($blogСurrent as $current) {
            $current->img = User::where('id', $current->id_user)->value('img');
        }
        $eventСurrent = Event::orderByDesc('created_at')->limit(2)->get();
        $imageСurrent = $_image->images(2);




        View::share([
            'dateEvent' => $dateEvent,
            'blogSitebar' => $blog,
            'banner' => $banner,
            'sitebarComment' => $comments,
            'articleSitebar' => $articleSitebar,

            'blogСurrent' => $blogСurrent,
            'eventСurrent' => $eventСurrent,
            'imageСurrent' => $imageСurrent
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
