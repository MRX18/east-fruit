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
        \App\Application::class => \App\Policies\ApplicationPolicy::class,
        \App\Article::class => \App\Policies\ArticlePolicy::class,
        \App\Permission::class => \App\Policies\PermissionPolicy::class,
        \App\Blog::class => \App\Policies\BlogPolicy::class,
        \App\Image::class => \App\Policies\ImagePolicy::class,

        \App\Event::class => \App\Policies\EventPolicy::class,
        \App\Conference::class => \App\Policies\ConferencePolicy::class,
        \App\Program::class => \App\Policies\ProgramPolicy::class,
        \App\Speaker::class => \App\Policies\SpeakerPolicy::class,
        \App\MediaReport::class => \App\Policies\MediaReportPolicy::class,
        \App\ConferenceMaterial::class => \App\Policies\ConferenceMaterialPolicy::class,

        \App\Price::class => \App\Policies\PricePolicy::class,
        \App\Product::class => \App\Policies\ProductPolicy::class,
        \App\Market::class => \App\Policies\MarketPolicy::class,
        \App\Specification::class => \App\Policies\SpecificationPolicy::class,
        \App\Currency::class => \App\Policies\CurrencyPolicy::class,

        \App\Answer::class => \App\Policies\AnswerPolicy::class,
        \App\Question::class => \App\Policies\QuestionPolicy::class,

        \App\Training::class => \App\Policies\TrainingPolicy::class,
        \App\TrainingEvent::class => \App\Policies\TrainingEventPolicy::class,
        \App\TrainingMap::class => \App\Policies\TrainingMapPolicy::class,
        \App\TrainingOrganizer::class => \App\Policies\TrainingOrganizerPolicy::class,
        \App\TrainingProgram::class => \App\Policies\TrainingProgramPolicy::class,

        \App\ResearchContent::class => \App\Policies\ResearchContentPolicy::class,
        \App\Research::class => \App\Policies\ResearchPolicy::class,

        \App\Banners::class => \App\Policies\BannersPolicy::class,

        \App\Video::class => \App\Policies\VideoPolicy::class,

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
