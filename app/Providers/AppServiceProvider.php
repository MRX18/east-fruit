<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Event;

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
        View::share('dateEvent', $dateEvent);
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
