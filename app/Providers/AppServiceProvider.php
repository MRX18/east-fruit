<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Event;
use App\Blog;
use App\BlogComment;
use App\Banners;
use App\ArticlesComment;
use App\Article;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        /*события в календаре*/
        $dateEvent = Event::select('date')->get();
        foreach($dateEvent as $event) {
            $date = explode('-', $event->date);
            $event->date = $date[1].'/'.$date[2].'/'.$date[0];
        }


        /*новые записи блога для сайтбара*/
        $_blog = new Blog;
        $blog = $_blog->allArticlesBlog(3);


        /*реклама на сайте*/
        $_banners = new Banners;
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


        View::share([
            'dateEvent' => $dateEvent,
            'blogSitebar' => $blog,
            'banner' => $banner,
            'sitebarComment' => $comments
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
