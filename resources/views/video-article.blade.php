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

                            <div class="video-container-article">
                               {!! $article->video !!}
                            </div>

                            <div class="descr-item">
                                {!! $article->text !!}
                            </div>

                        </div>

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
                                                <p class="ellipsis"><a
                                                            href="{{ $sitebar->slug }}">{{ $sitebar->title}}</a>
                                                </p>
                                                <div class="entry-meta bg-{{ rand(1,9) }}">
                                                    @if($sitebar->visible == 1)
                                                        {{ $sitebar->catigor }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{--<h3>Актуальное в блоге</h3>--}}
                                {{--@foreach($blogSitebar as $sitebar)--}}
                                    {{--<div data-key="43">--}}
                                        {{--<div class="item">--}}
                                            {{--<div class="item-image">--}}
                                                {{--<span class="item-image-date">{{ $sitebar->date }}</span>--}}
                                                {{--<!--<span class="item-image-time">09:30</span>-->--}}
                                            {{--</div>--}}
                                            {{--<div class="item-content">--}}
                                                {{--<p class="ellipsis">                       @if($sitebar->slug == NULL)--}}
										  {{--<a href="{{ route('articleBlog', ['id'=>$sitebar->id]) }}">{{ $sitebar->title }}</a>--}}
                                        {{--@else--}}
                                            {{--<a href="{{ route('articleBlog', ['id'=>$sitebar->slug]) }}">{{ $sitebar->title }}</a>--}}
                                        {{--@endif--}}
                                                {{--</p>--}}
                                                {{--<div class="entry-meta bg-{{ $sitebar->id_catigories }}">--}}
                                                    {{--@if($sitebar->visible == 1)--}}
                                                        {{--{{ $sitebar->catigor }}--}}
                                                    {{--@endif--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--@endforeach--}}

                            </div>
                        </div>
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