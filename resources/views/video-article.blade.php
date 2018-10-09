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
                                <li><a style="font-weight: normal;" href="{{ route('video') }}">Видео</a></li>
                            </ul>
                        </div>

                        <div class="news-more-item">

                            <h2 class="title-item">{{ $article->title }}</h2>

                            @if(isset($article->pdf))
                                <a class="article-download" href="{{ asset($article->pdf) }}" download>Скачать полную
                                    версию </a>
                            @endif

                            <span class="date-item">{{ date("d.m.Y", strtotime($article->date)) }}</span>

                            <div class="video-container-article">
                                @if($article->video_view == 1)
                                    {!! $article->video_iframe !!}
                                @else
                                    <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="640" height="264"
                                           poster="{{ asset($article->video_img) }}"
                                           data-setup="{}">
                                        <source src="{{ asset($article->video) }}" type='video/mp4' />
                                    </video>
                                @endif
                            </div>

                            <div class="descr-item">
                                {!! $article->text !!}
                            </div>
                            <p>Основные новости и аналитика плодоовощного рынка на <a href="https://www.facebook.com/eastfruit/">Facebook</a> и в <a href="https://t.me/eastfruit">Telegram</a> East-Fruit.com 
<br>Подписывайтесь!</p>
<p style="font-size: 14px">Использование материалов сайта свободно при наличии прямой, открытой для поисковых систем, ссылки на конкретную публикацию аналитической платформы <a href="https://east-fruit.com">East-fruit.com</a>.</p>
                            <div class="share42init" data-url="{{ route('video-article', ['id' => $article->slug]) }}"
                                 data-title="{{ $article->title }}" data-image="{{ asset($article->video_img) }}"
                                 data-description="{{  date("d.m.Y", strtotime($article->date)) }}"></div>
                            @if(isset($article->pdf))
                                <embed width="100%" height="350px" name="plugin" id="plugin"
                                       src="{{ asset($article->pdf) }}" type="application/pdf" internalinstanceid="4">
                            @endif

                        </div>

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