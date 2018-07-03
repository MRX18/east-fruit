<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Event;
use App\Blog;
use App\Banners;

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
        $blog = $_blog->sitebar(3);


        /*реклама на сайте*/
        $_banners = new Banners;
        $banner = $_banners->index();


        View::share([
            'dateEvent' => $dateEvent,
            'blogSitebar' => $blog,
            'banner' => $banner
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
