<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \App\Role::class => \App\Policies\RolePolicy::class,
        \App\User::class => \App\Policies\UserPolicy::class,
        \App\ArticlesComment::class => \App\Policies\ArticlesCommentPolicy::class,
        \App\Price::class => \App\Policies\PricePolicy::class,
        \App\Application::class => \App\Policies\ApplicationPolicy::class,
        \App\Article::class => \App\Policies\ArticlePolicy::class,
        \App\Permission::class => \App\Policies\PermissionPolicy::class,
        \App\Blog::class => \App\Policies\BlogPolicy::class,
        \App\Image::class => \App\Policies\ImagePolicy::class,

        \App\Event::class => \App\Policies\EventPolicy::class,
        \App\Conference::class => \App\Policies\ConferencePolicy::class,
        \App\Program::class => \App\Policies\ProgramPolicy::class,
        \App\Speaker::class => \App\Policies\SpeakerPolicy::class,

//        \App\Permission::class => \App\Policies\PermissionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
