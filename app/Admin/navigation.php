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
                ->setPriority(200)
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
                ->setPriority(400)
        ]
    ],

    // [
    //     'title' => "Цены",
    //     'icon' => 'fa fa-credit-card',
    //     'pages' => [
    //         (new Page(\App\Permission::class))
    //             ->setIcon('fa fa-key')
    //             ->setPriority(0),
    //         (new Page(\App\Role::class))
    //             ->setIcon('fa fa-graduation-cap')
    //             ->setPriority(100),
    //         (new Page(\App\User::class))
    //             ->setIcon('fa fa-user')
    //             ->setPriority(200)
    //     ]
    // ],

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