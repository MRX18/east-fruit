@extends('layouts.main')
@section('content')
<section id="main-section">

    <section id="news-section">
        <div class="container">
            <div class="row no-gutter">

                <link rel="stylesheet" href="../../css/style-items.css"/>
<div class="col-sm-8 col-lg-9">
    <div class="news-bredcrumbs-item">
        <ul>
            <li class="img-logo"><img src="../../images/page-item/Layer&#32;968.png" alt="Главная"></li>
            <li><a href="/">Главная</a></li>
            <li><img src="../../images/page-item/Polygon&#32;968.png" alt="/"></li>
            <li><a style="font-weight: normal;" href="{{ route('event', ['id'=>date('Y')]) }}">Календарь событий</a></li>
        </ul>
    </div>

    <div class="news-more-item">

        <div class="user-article">
           <div class="img"> <img src="{{ asset($event->img) }}" alt=""></div>
           <div class="text" style="margin-left: 20px;">
               <h3>{{ $event->title }}</h3>
               <span style="margin-top: 10px;" class="date-user">{{ $event->date }}</span>
               <p style="margin-top: -10px;">{{ $event->adres }}</p>
           </div>
        </div>

        <div style="margin-top: 30px;" class="menu-calendar">
            <ul>
                <li><a href="{{ route('conference', ['id'=>$event->id]) }}">О конференции</a></li>
                <li><a href="{{ route('program', ['id'=>$event->id]) }}">Программа</a></li>
                <li><a class="date-active" href="{{ route('speakers', ['id'=>$event->id]) }}">Спикеры</a></li>
            </ul>
        </div>

        <h2 class="title-item"Спикеры</h2>

        <div class="descr-item">
            
            @foreach($speakers as $speaker)
            <div class="program">
                <div class="program-left" style="background-image: url({{ asset($speaker->img) }});"></div>
                <div class="program-right">
                    <h3>{{ $speaker->title }}</h3>
                    <div class="prog-text" style="font-size: 16px; font-weight: normal;">
                        {!! $speaker->text !!}
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>

    </div>


                <div class="col-sm-4 col-lg-3 hidden-xs category-left-block">

                    <div class="entry-post">
                        <h3>Актуальное</h3>
                        <!-- Begin .item-->
                        <div id="w4" class="list-view">

                        @foreach($sitebarArticle as $sitebar)
                        <div data-key="43">
                            <div class="item">
                                <div class="item-image">
                                    <span class="item-image-date">{{ $sitebar->date }}</span>
                                    <!--<span class="item-image-time">09:30</span>-->
                                </div>
                                <div class="item-content">
                                    <p class="ellipsis"><a href="{{ route('article', ['id'=>$sitebar->slug]) }}">{{ $sitebar->title }}</a></p>
                                    <div class="entry-meta bg-{{ rand(1,9) }}">
                                        @if($sitebar->visible == 1)
                                            {{ $sitebar->catigor }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="add-article" style="margin-bottom: 30px;">
                            <a href="{{ route('all-articles') }}">Больше новостей</a>
                        </div>

                    </div></div>

                    <div class="banner-category">
                        <img src="../../images/page-category/Layer&#32;920.png" alt="Banner">
                    </div>

                </div>

            </div>
        </div>
    </section>

</section>
@endsection