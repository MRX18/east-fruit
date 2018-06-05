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
            <li><a style="font-weight: normal;" href="{{ route('research') }}">Исследования</a></li>
        </ul>
    </div>

    <div class="news-more-item">
        @if(isset($articlesContent->title))
            <h2 class="title-item">{{ $articles->title }}</h2>
        @else
            <h2 class="title-item">{{ $articles->title.'-'.$articlesContent->title }}</h2>
        @endif
        
        @if(isset($articlesContent->pdf))
            <a class="article-download" href="{{ asset($articlesContent->pdf) }}" download>Скачать полную версию </a>
        @endif

        <span class="date-item">{{ $articles->date }}</span>

        <div class="img-item img-lid">
            <img src="{{ asset($articles->img) }}" alt="{{ $articles->title }}">
            @if(!empty($articles->lid)) 
                <div class="lid">
                    <p>{{ $articles->lid }}</p>
                </div>
            @endif
        </div>

        <div class="descr-item">
            {!! $articlesContent->text !!}       
        </div>

        <div class="share42init" data-url="{{ route('min-research', ['id' => $articles->id]) }}" data-title="{{ $articles->title }}" data-image="{{ asset($articles->img) }}" data-description="{{ $articles->lid }}"></div>


        @if(isset($articlesContent->pdf))
            <embed width="100%" height="350px" name="plugin" id="plugin" src="{{ asset($articlesContent->pdf) }}" type="application/pdf" internalinstanceid="4">
        @endif
    </div>

    <!--comments-item-->

        <!--more-news-item"-->

    </div>


                <div class="col-sm-4 col-lg-3 hidden-xs">
                    
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
                <p class="ellipsis"><a href="{{ route('article', ['id'=>$sitebar->slug]) }}">{{ $sitebar->title}}</a></p>
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
                    <div class="calendar-ev">
                        <a href="{{ route('event', ['id'=>date('Y')]) }}">Календарь событий</a>
                    </div>
                    <div id='calendar'></div>
                </div>

            </div>
        </div>
    </section>

</section>
@endsection