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
                                <li><a style="font-weight: normal;" href="{{ route('images') }}">Фотогалерея</a></li>
                            </ul>
                        </div>

                        <div class="news-more-item">

                            <h2 class="title-item">{{ $article->title }}</h2>

                            @if(isset($article->pdf))
                                <a class="article-download" href="{{ asset($article->pdf) }}" download>Скачать полную
                                    версию </a>
                            @endif

                            <span class="date-item">{{ $article->date }}</span>

                            <div class="img-item img-lid">
                                <img src="{{ asset($article->img) }}" alt="">
                                @if(!empty($article->lid))
                                    <div class="lid">
                                        <p>{{ $article->lid }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="images-item">
                                {!! $article->text !!}
                               <p>Основные новости и аналитика плодоовощного рынка на <a href="https://www.facebook.com/eastfruit/">Facebook</a> и в <a href="https://t.me/eastfruit">Telegram</a> East-Fruit.com 
<br>Подписывайтесь!</p>
<p style="font-size: 14px">Использование материалов сайта свободно при наличии прямой, открытой для поисковых систем, ссылки на конкретную публикацию аналитической платформы <a href="https://east-fruit.com">East-fruit.com</a>.</p>
                                @if(isset($article->images))
                                    <div class="img-cont article-galery">
                                        @foreach($article->images as $image)
                                            <a href="{{ asset($image) }}" class="item"><img
                                                        src="{{ asset($image) }}"></a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div class="share42init" data-url="{{ route('image-article', ['id' => $article->id]) }}"
                                 data-title="{{ $article->title }}" data-image="{{ asset($article->img) }}"
                                 data-description="{{ $article->lid }}"></div>

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