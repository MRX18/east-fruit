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
                                <li class="img-logo"><img src="../../images/page-item/Layer-968.png" alt="Главная">
                                </li>
                                <li><a href="/">Главная</a></li>
                                <li><img src="../../images/page-item/Polygon-968.png" alt="/"></li>
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
                                <a class="article-download" href="{{ asset($articlesContent->pdf) }}" download>Скачать
                                    полную версию </a>
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

                            <div class="share42init" data-url="{{ route('min-research', ['id' => $articles->id]) }}"
                                 data-title="{{ $articles->title }}" data-image="{{ asset($articles->img) }}"
                                 data-description="{{ $articles->lid }}"></div>


                            @if(isset($articlesContent->pdf))
                                <embed width="100%" height="350px" name="plugin" id="plugin"
                                       src="{{ asset($articlesContent->pdf) }}" type="application/pdf"
                                       internalinstanceid="4">
                                <a class="article-download" href="{{ asset($articlesContent->pdf) }}" target="_blank">Посмотреть полную версию</a>
                            @endif
                        </div>

                        <!--comments-item-->

                        <!--more-news-item"-->

                    </div>


                    <div class="col-sm-4 col-lg-3 hidden-xs">

                        @include('includes.sitebar', ['$sitebarArticle' => $sitebarArticle])

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