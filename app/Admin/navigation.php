<?php

use SleepingOwl\Admin\Navigation\Page;

// Default check access logic
// AdminNavigation::setAccessLogic(function(Page $page) {
// 	   return auth()->user()->isSuperAdmin();
// });
//
// AdminNavigation::addPage(\App\User::class)->setTitle('test')->setPages(function(Page $page) {
// 	  $page
//		  ->addPage()
//	  	  ->setTitle('Dashboard')
//		  ->setUrl(route('admin.dashboard'))
//		  ->setPriority(100);
//
//	  $page->addPage(\App\User::class);
// });
//
// // or
//
// AdminSection::addMenuPage(\App\User::class)

return [
    [
        'title' => 'Dashboard',
        'icon'  => 'fa fa-dashboard',
        'url'   => route('admin.dashboard'),
    ],

    [
        'title' => 'Information',
        'icon'  => 'fa fa-exclamation-circle',
        'url'   => route('admin.information'),
    ],

    [
        'title' => "Пользователи",
        'icon' => 'fa fa-credit-card',
        'pages' => [
            (new Page(\App\Permission::class))
                ->setIcon('fa fa-key')
                ->setPriority(0),
            (new Page(\App\Role::class))
                ->setIcon('fa fa-graduation-cap')
                ->setPriority(100),
            (new Page(\App\User::class))
                ->setIcon('fa fa-user')
                ->setPriority(200),
            [
                'title' => 'Команда East-Fruit',
                'icon'  => 'fa fa-users',
                'url'   => route('eastfruit'),
                'priority' => 400,
            ],
        ]
    ],
/**/
    [
        'title' => "Календарь событий",
        'icon' => 'fa fa-sliders',
        'pages' => [
            (new Page(\App\Event::class))
                ->setIcon('fa fa-sliders')
                ->setPriority(0),
            (new Page(\App\Conference::class))
                ->setIcon('fa fa-sliders')
                ->setPriority(100),
            (new Page(\App\Program::class))
                ->setIcon('fa fa-sliders')
                ->setPriority(200),
            (new Page(\App\Speaker::class))
                ->setIcon('fa fa-sliders')
                ->setPriority(400),
            (new Page(\App\MediaReport::class))
                ->setIcon('fa fa-sliders')
                ->setPriority(800),
            (new Page(\App\ConferenceMaterial::class))
                ->setIcon('fa fa-sliders')
                ->setPriority(1600)
        ]
    ],

    [
        'title' => "Цены",
        'icon' => 'fa fa-sliders',
        'pages' => [
            (new Page(\App\Price::class))
                ->setIcon('fa fa-sliders')
                ->setPriority(0),
            (new Page(\App\Product::class))
                ->setIcon('fa fa-sliders')
                ->setPriority(100),
            (new Page(\App\Market::class))
                ->setIcon('fa fa-sliders')
                ->setPriority(200),
            (new Page(\App\Specification::class))
                ->setIcon('fa fa-sliders')
                ->setPriority(400),
            (new Page(\App\Currency::class))
                ->setIcon('fa fa-sliders')
                ->setPriority(800),
            [
                'title' => 'Цены Excel',
                'icon'  => 'fa fa-users',
                'url'   => route('excel'),
                'priority' => 1000,
            ],
        ]
    ],

    [
        'title' => "Опросник",
        'icon' => 'fa fa-sliders',
        'pages' => [
            (new Page(\App\Question::class))
                ->setIcon('fa fa-sliders')
                ->setPriority(0),
            (new Page(\App\Answer::class))
                ->setIcon('fa fa-sliders')
                ->setPriority(100),
        ]
    ],

//    [
//        'title' => "Обучающие поездки",
//        'icon' => 'fa fa-sliders',
//        'pages' => [
//            (new Page(\App\Training::class))
//                ->setIcon('fa fa-sliders')
//                ->setPriority(0),
//            (new Page(\App\TrainingEvent::class))
//                ->setIcon('fa fa-sliders')
//                ->setPriority(100),
//            (new Page(\App\TrainingProgram::class))
//                ->setIcon('fa fa-sliders')
//                ->setPriority(200),
//            (new Page(\App\TrainingOrganizer::class))
//                ->setIcon('fa fa-sliders')
//                ->setPriority(400),
//            (new Page(\App\TrainingMap::class))
//                ->setIcon('fa fa-sliders')
//                ->setPriority(800)
//        ]
//    ],

    [
        'title' => "Исследования",
        'icon' => 'fa fa-sliders',
        'pages' => [
            (new Page(\App\Research::class))
                ->setIcon('fa fa-sliders')
                ->setPriority(0),
            (new Page(\App\ResearchContent::class))
                ->setIcon('fa fa-sliders')
                ->setPriority(100)
        ]
    ],

    [
        'title' => "Статьи",
        'icon' => 'fa fa-sliders',
        'pages' => [
            (new Page(\App\Article::class))
                ->setIcon('fa fa-sliders')
                ->setPriority(0),
            (new Page(\App\ArticlesComment::class))
                ->setIcon('fa fa-sliders')
                ->setPriority(100),
        ]
    ],

    [
        'title' => "Блог",
        'icon' => 'fa fa-sliders',
        'pages' => [
            (new Page(\App\Blog::class))
                ->setIcon('fa fa-sliders')
                ->setPriority(0),
            (new Page(\App\BlogComment::class))
                ->setIcon('fa fa-sliders')
                ->setPriority(100),
        ]
    ],

    // Examples
    // [
    //    'title' => 'Content',
    //    'pages' => [
    //
    //        \App\User::class,
    //
    //        // or
    //
    //        (new Page(\App\User::class))
    //            ->setPriority(100)
    //            ->setIcon('fa fa-user')
    //            ->setUrl('users')
    //            ->setAccessLogic(function (Page $page) {
    //                return auth()->user()->isSuperAdmin();
    //            }),
    //
    //        // or
    //
    //        new Page([
    //            'title'    => 'News',
    //            'priority' => 200,
    //            'model'    => \App\News::class
    //        ]),
    //
    //        // or
    //        (new Page(/* ... */))->setPages(function (Page $page) {
    //            $page->addPage([
    //                'title'    => 'Blog',
    //                'priority' => 100,
    //                'model'    => \App\Blog::class
	//		      ));
    //
	//		      $page->addPage(\App\Blog::class);
    //	      }),
    //
    //        // or
    //
    //        [
    //            'title'       => 'News',
    //            'priority'    => 300,
    //            'accessLogic' => function ($page) {
    //                return $page->isActive();
    //		      },
    //            'pages'       => [
    //
    //                // ...
    //
    //            ]
    //        ]
    //    ]
    // ]
];