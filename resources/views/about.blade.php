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
                                <li class="img-logo"><img src="../../images/page-item/Layer-968.png" alt="Главная"></li>
                                <li><a href="/">Главная</a></li>
                                <li><img src="../../images/page-item/Polygon-968.png" alt="/"></li>
                                <li><a style="font-weight: normal;" href="{{ route('about') }}">О проекте</a></li>
                            </ul>
                        </div>

                        <div class="news-more-item">

                            <h2 class="title-item">{{ $content->title }}</h2>


                            <div class="descr-item">
                                {!! $content->text !!}
                            </div>

                        </div>

                    </div>


                    <div class="col-sm-4 col-lg-3 hidden-xs">

                        @include('includes.sitebar', ['$sitebarArticle' => $sitebarArticle])

                    </div>

                </div>
            </div>
        </section>

    </section>
@endsection